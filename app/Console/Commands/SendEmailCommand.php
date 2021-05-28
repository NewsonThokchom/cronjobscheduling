<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

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
     * @return int
     */
    public function handle()
    {
        // return 0;
        $users = User::all();
        foreach ($users as $user) {
            Mail::raw('Testing Cron Job ', function ($message) use ($user) {
                $message->from('NewsonThokchom@gmail.com', 'Newson Thokchom');
                // $message->sender('john@johndoe.com', 'John Doe');
                $message->to($user->email)->subject('Testing Cron Job Funcationality');
                // $message->cc('john@johndoe.com', 'John Doe');
                // $message->bcc('john@johndoe.com', 'John Doe');
                // $message->replyTo('john@johndoe.com', 'John Doe');
                // $message->subject('Testing CronJob Funcationality');
                // $message->priority(3);
                // $message->attach('pathToFile');
            });
            $this->info("Email Sent Successfully");
        }
    }
}
