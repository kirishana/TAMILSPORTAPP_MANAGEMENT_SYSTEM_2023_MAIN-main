<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class LeagueCancelMailSend implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    public $timeout = 7200; // 2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details=$details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            $clubAdminEmails=$this->details['clubAdminEmails'];
            $userEmails=$this->details['userEmails'];
            $org=$this->details['org'];
            $league=$this->details['league'];
            Mail::send(
                    ['html' => 'CancelLeagueMail'],
                    ['org'=>$org,'league'=>$league,'general'=>$this->details['general']],
                    function ($message) use($userEmails,$clubAdminEmails) {
                        $message->to("antonroy68@gmail.com");
                        $message->bcc($userEmails,$clubAdminEmails)->subject('Cancellation');
                        
                    }
                );
    }
}
