<?php

namespace Spatie\CronlessSchedule\Commands;

use Clue\React\Stdio\Stdio;
use Illuminate\Console\Command;
use React\EventLoop\LoopInterface;

class ScheduleRunCronlessCommand extends Command
{
    public $signature = 'schedule:run-cronless
                            {--frequency=60}
                            {--command=schedule:run}
                            {--stop-after-seconds=0}
    ';

    public $description = 'Run the scheduler';

    protected ?string $command = null;

    protected ?int $frequency = null;

    protected LoopInterface $loop;

    public function __construct(LoopInterface $loop)
    {
        $this->loop = $loop;

        parent::__construct();
    }

    public function handle()
    {
        $this->frequency = (int)$this->option('frequency');
        $this->command = (string)$this->option('command');

        $this
            ->outputHeader()
            ->scheduleCommand()
            ->registerKeypressHandler()
            ->runCronlessCommand();

        $this->loop->run();
    }

    protected function outputHeader(): self
    {
        $this->comment("Will execute {$this->command} every {$this->frequency} seconds...");
        $this->comment("Press enter to manually invoke a run...");
        $this->comment('-------------------------------------------------------');
        $this->comment('');

        return $this;
    }

    protected function scheduleCommand(): self
    {
        $stopAfter = (int)$this->option('stop-after-seconds');

        if ($stopAfter > 0) {
            $this->loop->addTimer($stopAfter, fn () => $this->loop->stop());
        }

        $this->loop->addPeriodicTimer($this->frequency, fn () => $this->runCronlessCommand());

        return $this;
    }

    protected function registerKeypressHandler(): self
    {
        $stdio = new Stdio($this->loop);

        $stdio->setEcho(false);

        $stdio->on('data', fn () => $this->runCronlessCommand());

        return $this;
    }

    protected function runCronlessCommand()
    {
        $this->comment($this->timestamp("Running {$this->command}..."));

        $this->call($this->command);

        $this->comment($this->timestamp("{$this->command} finished."));
        $this->comment('');
    }

    protected function timestamp(string $message): string
    {
        $currentTime = now()->format('Y-m-d H:i:s');

        return "[{$currentTime}] - {$message}";
    }
}
