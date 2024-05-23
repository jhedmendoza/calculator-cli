<?php
# to register (app/Console/Kernel.php)
class Kernel extends ConsoleKernel {
    protected $commands = [
        Commands\Add::class,
        Commands\Subtract::class,
        Commands\Multiply::class,
        Commands\Divide::class,
        Commands\SquareRoot::class,
    ];

    protected function commands() {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}

?>