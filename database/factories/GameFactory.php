<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory {
    protected $model = Game::class;

    public function definition(): array {
        return [
            'name'          => 'Game',
            'current_turn'  => 1,
            'current_round' => 1,
        ];
    }
}
