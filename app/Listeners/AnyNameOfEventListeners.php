<?php

namespace App\Listeners;

use App\Events\AnyNameOfEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AnyNameOfEventListeners
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
     * @param  AnyNameOfEvent  $event
     * @return void
     */
    public function handle(AnyNameOfEvent $event)
    {
        //
    }
}
