<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Jobs\SendEmailRegisteredHandler;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailRegisteredNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        dispatch(new SendEmailRegisteredHandler($event->getUser()));
    }
}
