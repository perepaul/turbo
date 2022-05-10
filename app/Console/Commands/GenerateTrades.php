<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GenerateTrades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trades:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate trades for auto tradable accounts';

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
        $user = User::query()->autoTradeable()->get();
        $user->each->autoTrade();
        $this->info("total number users: " . count($user));
        return 0;
    }
}
