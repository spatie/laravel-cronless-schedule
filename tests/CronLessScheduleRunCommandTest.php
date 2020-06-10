<?php

namespace Spatie\CronlessSchedule\Tests;

use React\EventLoop\Factory;
use Spatie\CronlessSchedule\Commands\CronlessScheduleRunCommand;

class CronLessScheduleRunCommandTest extends TestCase
{
    /** @test */
    public function it_can_run_the_loop_without_cron()
    {
        /** @var CronlessScheduleRunCommand $command */
        $command = app(CronlessScheduleRunCommand::class);


        $loop = Factory::create();

        $loop->addTimer(1, fn() => $loop->stop());

        $command->useLoop($loop);

        $command->handle();
    }
}
