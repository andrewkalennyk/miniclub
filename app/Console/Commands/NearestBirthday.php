<?php

namespace App\Console\Commands;

use App\Models\MiniClubBot;
use App\Models\TelegramNumberUser;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NearestBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'near:birth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Notification of Nearest Birthday';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $today = Carbon::today();

        if ($today->isLastOfMonth()) {
            $nextMonth = $today->copy()->addMonth()->month;

            // Fetch rows containing birthdays in the next month
            $birthdayUsers = TelegramNumberUser::whereMonth('birth_day', $nextMonth)->get();

            if ($birthdayUsers->isNotEmpty()) {
                $bot = new MiniClubBot();
                $bot->sendBithdayMessage($birthdayUsers);
            }
        }
    }
}
