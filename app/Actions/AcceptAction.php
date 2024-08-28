<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;
use App\Models\Order;

class AcceptAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Accept';
    }

    public function getIcon()
    {
        return 'voyager-eye';
    }

    public function getPolicy()
    {
        return 'browse';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right',
        ];
    }

    public function getDefaultRoute()
    {
        return route('acceptOrder', $this->data->id);
    }

    public function shouldActionDisplayOnDataType()
    {
        // $order = Order::find($this->data->id);
        // if ($order->status == 2) {
            return $this->dataType->slug == 'orders';
        // }
        
    }
}