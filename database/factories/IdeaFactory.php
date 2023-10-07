<?php

namespace Database\Factories;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory {
    protected $model = Idea::class;

    public function definition(): array {
        return [
            'name'     => $this->faker->word(),
            'category' => $this->faker->word(),
            'points'   => 0,
            'winner'   => false,
        ];
    }
}
