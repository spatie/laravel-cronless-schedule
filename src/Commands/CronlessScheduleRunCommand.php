<?php

namespace Spatie\CronlessSchedule\Commands;

use Closure;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use React\EventLoop\Factory;
use React\EventLoop\LoopInterface;
use Spatie\BackupServer\Support\Helpers\Enums\Task;
use Symfony\Component\Process\Process;

class CronlessScheduleRunCommand extends Command
{
    public $signature = 'cronless-schedule:run';

    public $description = 'Run the scheduler';

    protected ?LoopInterface $loop = null;

    public function handle()
    {
        $loop = $this->loop ?? Factory::create();

        $loop->addPeriodicTimer(60, function() {
            $currentTime = now()->format('Y-m-d H:i:s');

            $this->info("[{$currentTime}] - Executing schedule:run...");

            $this->call('schedule:run');
        });

        $loop->run();
    }

    protected function reportOutput(): Closure
    {
        return function(string $type, string $progressOutput) {
            if ($type === Process::ERR) {
                $this->error($progressOutput);

                return;
            }

            $this->info($progressOutput);
        };
    }

    public function useLoop(LoopInterface $loop)
    {
        $this->loop = $loop;
    }
}
