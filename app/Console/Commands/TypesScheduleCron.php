<?php

namespace App\Console\Commands;

use App\Http\Controllers\Service\ServiceController;
use Illuminate\Console\Command;

class TypesScheduleCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'types:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info("types is working fine!");
        ServiceController::launchAllSchedules();
        $this->info('types:Cron Cummand Run successfully!');

        //
    }
}
