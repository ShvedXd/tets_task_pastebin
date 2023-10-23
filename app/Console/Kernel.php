<?php

namespace App\Console;

use App\Http\Controllers\Paste\TimeDeleteController;
use App\Models\Paste;
use App\Repositories\PasteRepository;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    private PasteRepository $repository;

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

   public function __construct(Application $app, Dispatcher $events,PasteRepository $repository)
   {
       parent::__construct($app, $events);
       $this->repository = $repository;
   }


    protected function schedule(Schedule $schedule)
    {

        // $schedule->command('inspire')->hourly();
        $schedule->call($this->repository->deleteTimeOutPastes())->everyMinute();
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
