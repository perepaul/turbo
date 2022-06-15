<?php

namespace App\Console\Commands;

use App\Models\Trade;
use Illuminate\Console\Command;

class ManipulateTrades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trades:manipulate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add profit or loss to active trades';

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
        $trades = Trade::active()->get();
        $trades->each->addOrRemoveProfit();


        return 0;
    }
}
