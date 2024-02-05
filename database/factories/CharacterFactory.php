<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CharacterFactory extends Factory {
    protected $model = Character::class;

    public function definition(): array {
        return [
            'name'       => $this->faker->name(),
            'level'      => $this->faker->numberBetween( 1, 12 ),
            'era'        => $this->pickEra(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    private function pickEra(): string {
        $int = random_int( 1, 4 );
        switch ( $int ) {
            case 1:
                return 'Socratic';
            case 2:
                return 'Medieval';
            case 3:
                return 'Modern';
            case 4:
                return 'Postmodern';
        }

        return 'modern';
    }
}
