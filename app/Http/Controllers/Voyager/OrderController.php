<?php

namespace App\Http\Controllers\Voyager;

use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

use App\Models\User;
use App\Models\MedicalCenter;
use App\Models\Patient;
use App\Models\Order;
use App\Models\Notification;
use Illuminate\Support\Facades\Hash;


class OrderController extends VoyagerBaseController
{
    use BreadRelationshipParser;

    public function index(Request $request)
    {
        // GET THE SLUG, ex. 'posts', 'pages', etc.
        $slug = $this->getSlug($request);

        // GET THE DataType based on the slug
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('browse', app($dataType->model_name));

        $getter = $dataType->server_side ? 'paginate' : 'get';

        $search = (object) ['value' => $request->get('s'), 'key' => $request->get('key'), 'filter' => $request->get('filter')];

        $searchNames = [];
        if ($dataType->server_side) {
            $searchNames = $dataType->browseRows->mapWithKeys(function ($row) {
                return [$row['field'] => $row->getTranslatedAttribute('display_name')];
            });
        }

        $orderBy = $request->get('order_by', $dataType->order_column);
        $sortOrder = $request->get('sort_order', $dataType->order_direction);
        $usesSoftDeletes = false;
        $showSoftDeleted = false;

        // Next Get or Paginate the actual content from the MODEL that corresponds to the slug DataType
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            $query = $model::select($dataType->name.'.*');

            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $query->{$dataType->scope}();
            }

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model)) && Auth::user()->can('delete', app($dataType->model_name))) {
                $usesSoftDeletes = true;

                if ($request->get('showSoftDeleted')) {
                    $showSoftDeleted = true;
                    $query = $query->withTrashed();
                }
            }

            // If a column has a relationship associated with it, we do not want to show that field
            $this->removeRelationshipField($dataType, 'browse');

            if ($search->value != '' && $search->key && $search->filter) {
                $search_filter = ($search->filter == 'equals') ? '=' : 'LIKE';
                $search_value = ($search->filter == 'equals') ? $search->value : '%'.$search->value.'%';

                $searchField = $dataType->name.'.'.$search->key;
                if ($row = $this->findSearchableRelationshipRow($dataType->rows->where('type', 'relationship'), $search->key)) {
                    $query->whereIn(
                        $searchField,
                        $row->details->model::where($row->details->label, $search_filter, $search_value)->pluck('id')->toArray()
                    );
                } else {
                    if ($dataType->browseRows->pluck('field')->contains($search->key)) {
                        $query->where($searchField, $search_filter, $search_value);
                    }
                }
            }

            $row = $dataType->rows->where('field', $orderBy)->firstWhere('type', 'relationship');
            if ($orderBy && (in_array($orderBy, $dataType->fields()) || !empty($row))) {
                $querySortOrder = (!empty($sortOrder)) ? $sortOrder : 'desc';
                if (!empty($row)) {
                    $query->select([
                        $dataType->name.'.*',
                        'joined.'.$row->details->label.' as '.$orderBy,
                    ])->leftJoin(
                        $row->details->table.' as joined',
                        $dataType->name.'.'.$row->details->column,
                        'joined.'.$row->details->key
                    );
                }

                $dataTypeContent = call_user_func([
                    $query->orderBy($orderBy, $querySortOrder),
                    $getter,
                ]);
            } elseif ($model->timestamps) {
                $dataTypeContent = call_user_func([$query->latest($model::CREATED_AT), $getter]);
            } else {
                $dataTypeContent = call_user_func([$query->orderBy($model->getKeyName(), 'DESC'), $getter]);
            }

            // Replace relationships' keys for labels and create READ links if a slug is provided.
            $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType);
        } else {
            // If Model doesn't exist, get data from table name
            $dataTypeContent = call_user_func([DB::table($dataType->name), $getter]);
            $model = false;
        }

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($model);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'browse', $isModelTranslatable);

        // Check if server side pagination is enabled
        $isServerSide = isset($dataType->server_side) && $dataType->server_side;

        // Check if a default search key is set
        $defaultSearchKey = $dataType->default_search_key ?? null;

        // Actions
        $actions = [];
        if (!empty($dataTypeContent->first())) {
            foreach (Voyager::actions() as $action) {
                $action = new $action($dataType, $dataTypeContent->first());

                if ($action->shouldActionDisplayOnDataType()) {
                    $actions[] = $action;
                }
            }
        }

        // Define showCheckboxColumn
        $showCheckboxColumn = false;
        if (Auth::user()->can('delete', app($dataType->model_name))) {
            $showCheckboxColumn = true;
        } else {
            foreach ($actions as $action) {
                if (method_exists($action, 'massAction')) {
                    $showCheckboxColumn = true;
                }
            }
        }

        // Define orderColumn
        $orderColumn = [];
        if ($orderBy) {
            $index = $dataType->browseRows->where('field', $orderBy)->keys()->first() + ($showCheckboxColumn ? 1 : 0);
            $orderColumn = [[$index, $sortOrder ?? 'desc']];
        }

        // Define list of columns that can be sorted server side
        $sortableColumns = $this->getSortableColumns($dataType->browseRows);

        $view = 'voyager::bread.browse';

        if (view()->exists("voyager::$slug.browse")) {
            $view = "voyager::$slug.browse";
        }

        // return Voyager::view($view, compact(
        //     'actions',
        //     'dataType',
        //     'dataTypeContent',
        //     'isModelTranslatable',
        //     'search',
        //     'orderBy',
        //     'orderColumn',
        //     'sortableColumns',
        //     'sortOrder',
        //     'searchNames',
        //     'isServerSide',
        //     'defaultSearchKey',
        //     'usesSoftDeletes',
        //     'showSoftDeleted',
        //     'showCheckboxColumn'
        // ));

        if (request()->ajax()) {
            $data = array();
            foreach ($dataTypeContent as $key => $value) {
                $s = '';
                if ($value->status == 1) {
                    $s = 'accept';
                } else if($value->status == 2) {
                    $s = 'reject';
                } else {
                    $s = 'pending';
                }
                array_push($data,[
                    'medicalCenterName' => MedicalCenter::find($value->medical_center_id)->name,
                    'patientName'       => Patient::find($value->patient_id)->user->name,
                    'status'            => $s,
                    'createdAt'         => $value->created_at->toDateString(),
                ]);
            }


            return response()->json([
                'actions' => $actions,
                'dataType' => $dataType,
                'dataD'    => $data,
                'dataTypeContent' => $dataTypeContent,
                'isModelTranslatable' => $isModelTranslatable,
                'search' => $search,
                'orderBy' => $orderBy,
                'orderColumn' => $orderColumn,
                'sortableColumns' => $sortableColumns,
                'sortOrder' => $sortOrder,
                'searchNames' => $searchNames,
                'isServerSide' => $isServerSide,
                'defaultSearchKey' => $defaultSearchKey,
                'usesSoftDeletes' => $usesSoftDeletes,
                'showSoftDeleted' => $showSoftDeleted,
                'showCheckboxColumn' => $showCheckboxColumn,
            ], 200);
        }
        else {
            return Voyager::view($view, compact(
                'actions',
                'dataType',
                'dataTypeContent',
                'isModelTranslatable',
                'search',
                'orderBy',
                'orderColumn',
                'sortableColumns',
                'sortOrder',
                'searchNames',
                'isServerSide',
                'defaultSearchKey',
                'usesSoftDeletes',
                'showSoftDeleted',
                'showCheckboxColumn'
            ));
        }

    }

    public function acceptOrder($id)
    {
        $order = Order::find($id);
        $order->status = 1;
        $order->save();

        return back();
    }


    public function sendOrder(Request $request)
    {
        $data = $request->all();

        $order = Order::create($data);

        $title = 'مركز الطبي';
        $body = 'تم أرسال سيارة اسعاف';
        $body2 = 'تم أرسال سيارة اسعاف';
        $token = 'fXJKfYjw5ZgaUotWRTAMKN:APA91bG3DUTf3_rd6DkGWlHCwH0zcLZtLmubAAdUx0Kco3lNzz7gFCh8856QjOEeSwQfK1fixACo3VKf_u-FmCg8s7UisaNGdABN2vOjJUfmLo3pS-GC5lxdMc3OyVJGkhgjddPr2h98';
        $token2 = 'dxfBBmDr7C5F5Jo1YaKeZf:APA91bG-0XHM_HujqPE-5FNa-CN68zsmt5ahiCiIQjnXSY4hqTLq240mgcdTUM4pdIfV0JyGsPHNUJ1Rq6m6NoW6jJBHzwC18ApRumdxFvq4Nm3bp8g5Q6_PgGgKVvVnr13NX9saiT9t';
        $t = 'eFQt6I915EbI2jqQxLJNwO:APA91bHfViKTDHVMPAM8OiP2aujoLJ7ylq1bZ0lKeWzo-CXYx552u2GE43vS4EafAOIqyMC0jVTHnMxZ27Jh-mlMetUAPm9qTUg4Iw7_9c_UHl2Rs2VEDliKCCP_twe_wO3MUdMP8cHf';
        Notification::toSingleDevice($token,$title,$body,asset('/storage/widgets/emergency-status.jpg'),'https://google.com',1);
        Notification::toSingleDevice($token2,$title,$body2,asset('/storage/widgets/emergency-status.jpg'),'https://google.com',1);
        Notification::toSingleDevice($t,$title,$body2,asset('/storage/widgets/emergency-status.jpg'),'https://google.com',1);


        return response()->json([
            'message' => 'تم تحديد موقعك وارسال سيارة اسعاف لاقرب مركز طبي',
            'data' => $order,
        ], 200);
    }
}
