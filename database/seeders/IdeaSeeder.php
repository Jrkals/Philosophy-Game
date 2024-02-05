<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Game;
use App\Models\Idea;

class IdeaSeeder extends \Illuminate\Database\Seeder {

    public function seedIdeas( Game $game ): void {
        if ( ! $game ) {
            $game = Game::factory()->create();
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
            'name'     => 'Scholasticism',
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

    public function seedCharacters( Game $game ): void {
        $platonism    = Idea::query()->whereName( 'Platonism' )->firstOrFail();
        $virtueEthics = Idea::query()->whereName( 'Virtue Ethics' )->firstOrFail();
        $pantheism    = Idea::query()->whereName( 'Pantheism' )->firstOrFail();
        $democracy    = Idea::query()->whereName( 'Democracy' )->firstOrFail();
        $rationalism  = Idea::query()->whereName( 'Rationalism' )->firstOrFail();

        $socreates = Character::factory( [
            'name'  => 'Socrates',
            'era'   => 'Socratic',
            'level' => 12,
        ] )->for( $game )->create();
        $socreates->ideas()->attach( $platonism->id, [ 'type' => 'major' ] );
        $socreates->ideas()->attach( $virtueEthics->id, [ 'type' => 'major' ] );
        $socreates->ideas()->attach( $democracy->id, [ 'type' => 'major' ] );
        $socreates->ideas()->attach( $pantheism->id, [ 'type' => 'major' ] );
        $socreates->ideas()->attach( $rationalism->id, [ 'type' => 'major' ] );

        Character::factory( [
            'name'  => 'Aristotle',
            'era'   => 'Socratic',
            'level' => 12,
        ] )->for( $game )->create();
        Character::factory( [
            'name'  => 'Plato',
            'era'   => 'Socratic',
            'level' => 12,
        ] )->for( $game )->create();
        Character::factory( [
            'name'  => 'Epicurus',
            'era'   => 'Socratic',
            'level' => 7,
        ] )->for( $game )->create();
        Character::factory( [
            'name'  => 'Xenophone',
            'era'   => 'Socratic',
            'level' => 5,
        ] )->for( $game )->create();
        Character::factory( [
            'name'  => 'Thucydides',
            'era'   => 'Socratic',
            'level' => 6,
        ] )->for( $game )->create();
    }
}
