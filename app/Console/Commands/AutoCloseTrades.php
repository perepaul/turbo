<?php

namespace App\Console\Commands;

use App\Models\Trade;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AutoCloseTrades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trades:close';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to automatically close trades that have elapsed their time limit';



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
     * @return int
     */
    public function handle()
    {
        foreach (Trade::active()->expired()->get() as $trade) {
            $trade->close();
        }
        $this->info('ended old trades');
    }
}
