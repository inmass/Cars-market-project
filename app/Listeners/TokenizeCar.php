<?php

namespace App\Listeners;

use App\Events\CarCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class TokenizeCar
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
     * @param  CarCreated  $event
     * @return void
     */
    public function handle(CarCreated $event)
    {
        $car = $event->car;
        $uid = strval($car->id*17);
        $random_str = Str::random(3);
        $car->token = strval($random_str).strval($uid);
        $car->save();
    }
}
