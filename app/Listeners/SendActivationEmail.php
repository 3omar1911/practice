<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfigurationMail;



class SendActivationEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event) {

        if($event->user->act_key) {
            Mail::to($event->user)->send(new ConfigurationMail($event->user));
           // \Log::info($event->user->act_key);
        } else {
            \Log::info('listner fired in wrong order');
        }
        
    }
}
