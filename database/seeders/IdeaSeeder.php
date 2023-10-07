<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Idea;

class IdeaSeeder extends \Illuminate\Database\Seeder {

    public function run( Game $game ): void {
        if ( ! $game ) {
            $gam = Game::factory()->create();
        }
        $atheism             = Idea::factory( [
            'name'     => 'Atheism',
            'category' => 'Theism'
        ] )->for( $game )->create();
        $classicalTheism     = Idea::factory( [
            'name'     => 'Classical Theism',
            'category' => 'Theism'
        ] )->for( $game )->create();
        $theisticPersonalism = Idea::factory( [
            'name'     => 'Theistic Personalism',
            'category' => 'Theism'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Pantheism',
            'category' => 'Theism'
        ] )->for( $game )->create();
    }
}
