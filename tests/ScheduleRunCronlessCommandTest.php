<?php

namespace Spatie\CronlessSchedule\Tests;

use React\EventLoop\Factory;
use React\EventLoop\LoopInterface;

class ScheduleRunCronlessCommandTest extends TestCase
{
    /** @test */
    public function it_can_run_the_loop_without_cron()
    {
        $loop = Factory::create();

        $loop->addTimer(1, fn () => $loop->stop());

        $this->app->bind(LoopInterface::class, fn () => $loop);

        $this->artisan('schedule:run-cronless')->assertExitCode(0);

        $this->assertTrue(true);
    }
}
