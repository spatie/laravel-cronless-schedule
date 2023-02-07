<?php

uses(Spatie\CronlessSchedule\Tests\TestCase::class);

it('can run the loop without cron')
    ->artisan('schedule:run-cronless --stop-after-seconds=1')
    ->assertExitCode(0);
