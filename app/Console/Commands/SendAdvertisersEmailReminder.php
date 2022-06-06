<?php

namespace App\Console\Commands;

use App\Jobs\SendAdvertiserReminderEmail;
use App\Repository\AdvertiserRepositoryInterface;
use Illuminate\Console\Command;

class SendAdvertisersEmailReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advertisers:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'schedule a daily email at 08:00 PM that will be sent to advertisers who have ads the next day as a remainder.';

    protected $advertiserRepository;

    public function __construct(AdvertiserRepositoryInterface $advertiserRepository)
    {
        parent::__construct();

        $this->advertiserRepository = $advertiserRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        dispatch(new SendAdvertiserReminderEmail($this->advertiserRepository));
    }
}
