<?php

namespace Spatie\CronlessSchedule;

use Illuminate\Support\ServiceProvider;
use React\EventLoop\Factory;
use React\EventLoop\LoopInterface;
use Spatie\CronlessSchedule\Commands\ScheduleRunCronlessCommand;

class CronlessScheduleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app
            ->when(ScheduleRunCronlessCommand::class)
            ->needs(LoopInterface::class)
            ->give(fn () => Factory::create());
    }

    public function boot()
    {
        $this->commands([
            ScheduleRunCronlessCommand::class,
        ]);
    }
}
