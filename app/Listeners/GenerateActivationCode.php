<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateActivationCode implements ShouldQueue {

    public $activationCode;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event) {

        // logic to generate random string haven't done yet

        $this->activationCode = str_random(10);

        $event->user->act_key = $this->activationCode;
        $event->user->save();

        
    }
}
