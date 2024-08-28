<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Notification;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $title = 'مركز الطبي';
            $body = 'تم أرسال سيارة اسعاف';
            $body2 = 'تم أرسال سيارة اسعاف';
            $token = 'fXJKfYjw5ZgaUotWRTAMKN:APA91bG3DUTf3_rd6DkGWlHCwH0zcLZtLmubAAdUx0Kco3lNzz7gFCh8856QjOEeSwQfK1fixACo3VKf_u-FmCg8s7UisaNGdABN2vOjJUfmLo3pS-GC5lxdMc3OyVJGkhgjddPr2h98';
            $token2 = 'dxfBBmDr7C5F5Jo1YaKeZf:APA91bG-0XHM_HujqPE-5FNa-CN68zsmt5ahiCiIQjnXSY4hqTLq240mgcdTUM4pdIfV0JyGsPHNUJ1Rq6m6NoW6jJBHzwC18ApRumdxFvq4Nm3bp8g5Q6_PgGgKVvVnr13NX9saiT9t';
            $t = 'eFQt6I915EbI2jqQxLJNwO:APA91bHfViKTDHVMPAM8OiP2aujoLJ7ylq1bZ0lKeWzo-CXYx552u2GE43vS4EafAOIqyMC0jVTHnMxZ27Jh-mlMetUAPm9qTUg4Iw7_9c_UHl2Rs2VEDliKCCP_twe_wO3MUdMP8cHf';
            Notification::toSingleDevice($token,$title,$body,asset('/storage/widgets/emergency-status.jpg'),'https://google.com',1);
            Notification::toSingleDevice($token2,$title,$body1,asset('/storage/widgets/emergency-status.jpg'),'https://google.com',1);
            Notification::toSingleDevice($t,$title,$body1,asset('/storage/widgets/emergency-status.jpg'),'https://google.com',1);
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
