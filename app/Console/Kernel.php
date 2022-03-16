<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
//        if (app()->environment() == 'local') {
//            return;
//        }
        $schedule->command('app:mailing 7')->mondays()->at('3:00');
//        $schedule->command('app:mailing 7')->everyMinute();

    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
