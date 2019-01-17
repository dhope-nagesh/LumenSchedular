<?php

namespace App\Console;

use Log;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;
use \DateTime;

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
            $executionCount = 0;
            while($executionCount < 60) {
                $executionCount++;
                $now = new DateTime();
                Log::info($now->format('Y-m-d H:i:s').'Every Second');
                sleep(1);
            }
        })->everyMinute();
        // $schedule->call(function () {
        //     $now = new DateTime();
        //     Log::info($now->format('Y-m-d H:i:s').'Every Five Min');
        // })->everyFiveMinutes();
    }
}
