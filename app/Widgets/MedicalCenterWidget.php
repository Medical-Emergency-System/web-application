<?php

namespace App\Widgets;

use App\Models\MedicalCenter;

use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class MedicalCenterWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = MedicalCenter::count();
        $string = 'Medical Center';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-plus',
            'title'  => "{$count} {$string}",
            'text'   => '',
            'button' => [
                'text' => 'View Medical Centers',
                'link' => route('voyager.medical-centers.index'),
            ],
            'image' => asset('/storage/widgets/medical-center.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return true;
        // return Auth::user()->can('browse', Voyager::model('Student'));
    }
}
