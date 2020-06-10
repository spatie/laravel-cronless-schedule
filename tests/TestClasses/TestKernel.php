<?php

namespace Spatie\CronlessSchedule\Tests\TestClasses;

use Illuminate\Console\Scheduling\Schedule;
use Orchestra\Testbench\Console\Kernel;

class TestKernel extends Kernel
{
    public function schedule(Schedule $schedule)
    {
        dd('using schedule');
        $schedule->call(function () {
            dd('here');
        })->everyMinute();
    }
}
