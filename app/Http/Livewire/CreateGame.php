<?php

namespace App\Http\Livewire;

use App\Models\Game;
use Livewire\Component;

class CreateGame extends Component {
    public function render(): string {
        return view( 'livewire.create-game' );
    }

    public function create(): void {
        echo "here";
        $game = new Game();
        $game->save();
    }
}
