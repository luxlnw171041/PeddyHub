<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Check_day_lost_pet::class,
        Commands\Check_15_day_delete::class,
        Commands\AlertVaccine::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('cron:check_15days_lost__pets')->dailyAt('07:00')->withoutOverlapping(5);
        $schedule->command('cron:check_15day_sendcovid_and_check_in')->dailyAt('07:30')->withoutOverlapping(5);
        $schedule->command('cron:alert_vaccine')->dailyAt('08:00')->withoutOverlapping(5);

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
