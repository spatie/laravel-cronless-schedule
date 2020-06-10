<?php

namespace Spatie\CronlessSchedule;

use Illuminate\Support\ServiceProvider;
use Spatie\CronlessSchedule\Commands\CronlessScheduleRunCommand;

class CronlessScheduleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([
            CronlessScheduleRunCommand::class,
        ]);
    }

}
