<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory {
    protected $model = Player::class;

    public function definition(): array {
        return [
            'name'     => $this->faker->name(),
            'total'    => 0,
            'adjusted' => 0
        ];
    }
}
