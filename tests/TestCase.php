<?php

namespace Spatie\CronlessSchedule\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\CronlessSchedule\CronlessScheduleServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            CronlessScheduleServiceProvider::class,
        ];
    }
}
