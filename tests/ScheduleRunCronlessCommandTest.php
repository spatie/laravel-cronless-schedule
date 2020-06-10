<?php

namespace Spatie\CronlessSchedule\Tests;

class ScheduleRunCronlessCommandTest extends TestCase
{
    /** @test */
    public function it_can_run_the_loop_without_cron()
    {
        $this->artisan('schedule:run-cronless --stop-after-seconds=1')->assertExitCode(0);
    }
}
