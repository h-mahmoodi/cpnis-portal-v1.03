<?php

namespace App\Console;

use App\Http\Controllers\DocumentController;
use App\Jobs\SendEmail;
use App\Jobs\SendReminder;
use App\Mail\NewActivity;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // $schedule->call(function () {
        //     Mail::to('hesamahmoodi@gmail.com')->send(new NewActivity(1,1,1));

        // })->everyMinute();

        $schedule->job(new SendReminder())->everyMinute();



        // $schedule->job(new SendEmail(1,'123456'))->everyMinute();


        $schedule->exec('php artisan queue:work')->everyMinute();
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
