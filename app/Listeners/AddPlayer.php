<?php

namespace App\Listeners;

use App\Events\PlayerAdded;
use App\Models\Player;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddPlayer
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PlayerAdded $event): void
    {
        $player = new Player([
            'name' => 'Test',
            'game_id' => $event->game->id,
            'total' => 0,
            'adjusted' =>0
        ]);
        $player->save();
    }
}
