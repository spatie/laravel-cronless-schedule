<?php

namespace Spatie\CronlessSchedule\Tests;

use Illuminate\Contracts\Console\Kernel;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\CronlessSchedule\CronlessScheduleServiceProvider;
use Spatie\CronlessSchedule\Tests\TestClasses\TestKernel;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            CronlessScheduleServiceProvider::class,
        ];
    }

    protected function resolveApplicationConsoleKernel($app)
    {
        $app->singleton(Kernel::class, TestKernel::class);
    }
}
