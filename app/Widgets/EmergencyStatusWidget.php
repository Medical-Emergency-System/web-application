<?php

namespace App\Widgets;

use App\Models\EmergencyStatus;

use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class EmergencyStatusWidget extends AbstractWidget
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
        $count = EmergencyStatus::count();
        $string = 'Emergency Statuses';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-documentation',
            'title'  => "{$count} {$string}",
            'text'   => '',
            'button' => [
                'text' => 'View Statuses',
                'link' => route('voyager.emergency-statuses.index'),
            ],
            'image' => asset('/storage/widgets/emergency-status.jpg'),
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
