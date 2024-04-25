<?php

namespace App\Console\Commands;

use App\Models\InterestingFact;
use App\Models\MiniClubBot;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FunFact extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fun:fact';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Fun Fact';

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
        $today = Carbon::today();

        if (!array_key_exists($today->dayOfWeek, InterestingFact::WEEK_TYPE)) {
            return true;
        }
        $type = InterestingFact::WEEK_TYPE[$today->dayOfWeek];

        $interestingFact = InterestingFact::active()
            ->where('type', $type)
            ->get()
            ->shuffle()
            ->first();

        $bot = new MiniClubBot();
        $bot->sendMessage($interestingFact->fact);
    }
}
