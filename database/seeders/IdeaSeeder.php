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
        $pantheism           = Idea::factory( [
            'name'     => 'Monarchy',
            'category' => 'Politics'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Democracy',
            'category' => 'Politics'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Aristocracy',
            'category' => 'Politics'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Jesus is God',
            'category' => 'Jesus'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Jesus is mere man',
            'category' => 'Jesus'
        ] )->for( $game )->create();
        $materialiasm        = Idea::factory( [
            'name'     => 'Materialism',
            'category' => 'Metaphysics',
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Hylomorphism',
            'category' => 'Metaphysics'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Platonism',
            'category' => 'Metaphysics'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Nominalism',
            'category' => 'Metaphysics'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Virtue Ethics',
            'category' => 'Ethics'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Deontology',
            'category' => 'Ethics'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Utilitarianism',
            'category' => 'Ethics'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Nihilism',
            'category' => 'Ethics'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Thomism',
            'category' => 'Method'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Analytic',
            'category' => 'Method'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Continental',
            'category' => 'Method'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Rationalism',
            'category' => 'Epistemology'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Empiricism',
            'category' => 'Epistemology'
        ] )->for( $game )->create();
    }
}
