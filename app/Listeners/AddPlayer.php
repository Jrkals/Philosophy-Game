<?php

namespace App\Listeners;

use App\Events\PlayerAdded;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddPlayer {
    /**
     * Create the event listener.
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     */
    public function handle( PlayerAdded $event ): void {
        $player = new Game( [
        ] );
        $player->save();
    }
}
