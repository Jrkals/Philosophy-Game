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
            'name'     => 'Jesus Deity',
            'category' => 'Jesus'
        ] )->for( $game )->create();
        $pantheism           = Idea::factory( [
            'name'     => 'Jesus Mere Humanity',
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
        $freeWill            = Idea::factory( [
            'name'     => 'Free Will',
            'category' => 'Free Will'
        ] )->for( $game )->create();
        $determinism         = Idea::factory( [
            'name'     => 'Determinism',
            'category' => 'Free Will'
        ] )->for( $game )->create();
    }

    public function seedCharacters( Game $game ): void {
        $platonism    = Idea::query()->whereName( 'Platonism' )->whereGameId( $game->id )
                            ->firstOrFail();
        $virtueEthics = Idea::query()->whereName( 'Virtue Ethics' )->whereGameId( $game->id )
                            ->firstOrFail();
        $pantheism    = Idea::query()->whereName( 'Pantheism' )->whereGameId( $game->id )
                            ->firstOrFail();
        $democracy    = Idea::query()->whereName( 'Democracy' )->whereGameId( $game->id )
                            ->firstOrFail();
        $rationalism  = Idea::query()->whereName( 'Rationalism' )->whereGameId( $game->id )
                            ->firstOrFail();

        $socrates = Character::factory( [
            'name'  => 'Socrates',
            'era'   => 'Socratic',
            'level' => 12,
        ] )->for( $game )->create();
        $socrates->ideas()->attach( $platonism->id, [ 'type' => 'major' ] );
        $socrates->ideas()->attach( $virtueEthics->id, [ 'type' => 'major' ] );
        $socrates->ideas()->attach( $democracy->id, [ 'type' => 'major' ] );
        $socrates->ideas()->attach( $pantheism->id, [ 'type' => 'major' ] );
        $socrates->ideas()->attach( $rationalism->id, [ 'type' => 'major' ] );

        $classicalTheism = Idea::query()->whereName( 'Classical Theism' )->whereGameId( $game->id )
                               ->firstOrFail();
        $hylomorphism    = Idea::query()->whereName( 'Hylomorphism' )->whereGameId( $game->id )
                               ->firstOrFail();
        $empiricism      = Idea::query()->whereName( 'Empiricism' )->whereGameId( $game->id )
                               ->firstOrFail();
        $aristocracy     = Idea::query()->whereName( 'Aristocracy' )->whereGameId( $game->id )
                               ->firstOrFail();
        $aristotle       = Character::factory( [
            'name'  => 'Aristotle',
            'era'   => 'Socratic',
            'level' => 12,
        ] )->for( $game )->create();
        $aristotle->ideas()->attach( $classicalTheism->id, [ 'type' => 'founding' ] );
        $aristotle->ideas()->attach( $virtueEthics->id, [ 'type' => 'founding' ] );
        $aristotle->ideas()->attach( $hylomorphism->id, [ 'type' => 'founding' ] );
        $aristotle->ideas()->attach( $aristocracy->id, [ 'type' => 'major' ] );
        $aristotle->ideas()->attach( $empiricism->id, [ 'type' => 'major' ] );

        $plato = Character::factory( [
            'name'  => 'Plato',
            'era'   => 'Socratic',
            'level' => 12,
        ] )->for( $game )->create();
        $plato->ideas()->attach( $platonism->id, [ 'type' => 'founding' ] );
        $plato->ideas()->attach( $aristocracy->id, [ 'type' => 'major' ] );
        $plato->ideas()->attach( $rationalism->id, [ 'type' => 'major' ] );
        $plato->ideas()->attach( $pantheism->id, [ 'type' => 'minor' ] );

        $materialism = Idea::query()->whereName( 'Materialism' )->whereGameId( $game->id )
                           ->firstOrFail();
        $atheism     = Idea::query()->whereName( 'Atheism' )->whereGameId( $game->id )
                           ->firstOrFail();
        $epicurus    = Character::factory( [
            'name'  => 'Epicurus',
            'era'   => 'Socratic',
            'level' => 7,
        ] )->for( $game )->create();
        $epicurus->ideas()->attach( $atheism->id, [ 'type' => 'founding' ] );
        $epicurus->ideas()->attach( $empiricism->id, [ 'type' => 'founding' ] );
        $epicurus->ideas()->attach( $materialism->id, [ 'type' => 'major' ] );


        $xenophon = Character::factory( [
            'name'  => 'Xenophon',
            'era'   => 'Socratic',
            'level' => 5,
        ] )->for( $game )->create();
        $xenophon->ideas()->attach( $pantheism->id, [ 'type' => 'minor' ] );
        $xenophon->ideas()->attach( $democracy->id, [ 'type' => 'minor' ] );
        $xenophon->ideas()->attach( $empiricism->id, [ 'type' => 'minor' ] );

        $thucydides = Character::factory( [
            'name'  => 'Thucydides',
            'era'   => 'Socratic',
            'level' => 6,
        ] )->for( $game )->create();
        $thucydides->ideas()->attach( $aristocracy->id, [ 'type' => 'major' ] );
        $thucydides->ideas()->attach( $atheism->id, [ 'type' => 'minor' ] );
        $thucydides->ideas()->attach( $empiricism->id, [ 'type' => 'minor' ] );

        $freeWill      = Idea::query()->whereName( 'Free Will' )->whereGameId( $game->id )
                             ->firstOrFail();
        $scholasticism = Idea::query()->whereName( 'Scholasticism' )->whereGameId( $game->id )
                             ->firstOrFail();
        $deontology    = Idea::query()->whereName( 'Deontology' )->whereGameId( $game->id )
                             ->firstOrFail();
        $scotus        = Character::factory( [
            'name'  => 'Duns Scotus',
            'era'   => 'Medieval',
            'level' => 9,
        ] )->for( $game )->create();
        $scotus->ideas()->attach( $freeWill->id, [ 'type' => 'major' ] );
        $scotus->ideas()->attach( $classicalTheism->id, [ 'type' => 'major' ] );
        $scotus->ideas()->attach( $scholasticism->id, [ 'type' => 'major' ] );
        $scotus->ideas()->attach( $deontology->id, [ 'type' => 'minor' ] );

        $jesusDeity = Idea::query()->whereName( 'Jesus Deity' )->whereGameId( $game->id )
                          ->firstOrFail();
        $augustine  = Character::factory( [
            'name'  => 'Augustine',
            'era'   => 'Medieval',
            'level' => 10,
        ] )->for( $game )->create();
        $augustine->ideas()->attach( $classicalTheism->id, [ 'type' => 'major' ] );
        $augustine->ideas()->attach( $platonism->id, [ 'type' => 'major' ] );
        $augustine->ideas()->attach( $jesusDeity->id, [ 'type' => 'major' ] );
        $augustine->ideas()->attach( $virtueEthics->id, [ 'type' => 'minor' ] );
        $augustine->ideas()->attach( $rationalism->id, [ 'type' => 'minor' ] );

        $monarchy = Idea::query()->whereName( 'Monarchy' )->whereGameId( $game->id )
                        ->firstOrFail();
        $aquinas  = Character::factory( [
            'name'  => 'Aquinas',
            'era'   => 'Medieval',
            'level' => 11,
        ] )->for( $game )->create();
        $aquinas->ideas()->attach( $scholasticism->id, [ 'type' => 'founding' ] );
        $aquinas->ideas()->attach( $classicalTheism->id, [ 'type' => 'major' ] );
        $aquinas->ideas()->attach( $virtueEthics->id, [ 'type' => 'major' ] );
        $aquinas->ideas()->attach( $hylomorphism->id, [ 'type' => 'major' ] );
        $aquinas->ideas()->attach( $jesusDeity->id, [ 'type' => 'minor' ] );
        $aquinas->ideas()->attach( $monarchy->id, [ 'type' => 'minor' ] );
        $aquinas->ideas()->attach( $freeWill->id, [ 'type' => 'minor' ] );

        $nominalism          = Idea::query()->whereName( 'Nominalism' )->whereGameId( $game->id )
                                   ->firstOrFail();
        $theisticPersonalism = Idea::query()->whereName( 'Theistic Personalism' )->whereGameId( $game->id )
                                   ->firstOrFail();
        $ockham              = Character::factory( [
            'name'  => 'Ockham',
            'era'   => 'Medieval',
            'level' => 9,
        ] )->for( $game )->create();
        $ockham->ideas()->attach( $nominalism->id, [ 'type' => 'founding' ] );
        $ockham->ideas()->attach( $theisticPersonalism->id, [ 'type' => 'major' ] );
        $ockham->ideas()->attach( $deontology->id, [ 'type' => 'major' ] );
        $ockham->ideas()->attach( $freeWill->id, [ 'type' => 'major' ] );
        $ockham->ideas()->attach( $jesusDeity->id, [ 'type' => 'minor' ] );
        $ockham->ideas()->attach( $scholasticism->id, [ 'type' => 'minor' ] );


        $albertusMagnus = Character::factory( [
            'name'  => 'Albertus Magnus',
            'era'   => 'Medieval',
            'level' => 7,
        ] )->for( $game )->create();
        $albertusMagnus->ideas()->attach( $empiricism->id, [ 'type' => 'major' ] );
        $albertusMagnus->ideas()->attach( $scholasticism->id, [ 'type' => 'minor' ] );
        $albertusMagnus->ideas()->attach( $classicalTheism->id, [ 'type' => 'minor' ] );
        $albertusMagnus->ideas()->attach( $jesusDeity->id, [ 'type' => 'minor' ] );
        $albertusMagnus->ideas()->attach( $hylomorphism->id, [ 'type' => 'minor' ] );

        $boethius = Character::factory( [
            'name'  => 'Boethius',
            'era'   => 'Medieval',
            'level' => 6,
        ] )->for( $game )->create();
        $boethius->ideas()->attach( $platonism->id, [ 'type' => 'major' ] );
        $boethius->ideas()->attach( $classicalTheism->id, [ 'type' => 'minor' ] );
        $boethius->ideas()->attach( $jesusDeity->id, [ 'type' => 'minor' ] );

        $anselm = Character::factory( [
            'name'  => 'Anselm',
            'era'   => 'Medieval',
            'level' => 8,
        ] )->for( $game )->create();
        $anselm->ideas()->attach( $platonism->id, [ 'type' => 'major' ] );
        $anselm->ideas()->attach( $jesusDeity->id, [ 'type' => 'major' ] );
        $anselm->ideas()->attach( $rationalism->id, [ 'type' => 'major' ] );
        $anselm->ideas()->attach( $deontology->id, [ 'type' => 'minor' ] );
        $anselm->ideas()->attach( $classicalTheism->id, [ 'type' => 'minor' ] );

        $bonaventure = Character::factory( [
            'name'  => 'Bonaventure',
            'era'   => 'Medieval',
            'level' => 9,
        ] )->for( $game )->create();
        $bonaventure->ideas()->attach( $platonism->id, [ 'type' => 'major' ] );
        $bonaventure->ideas()->attach( $classicalTheism->id, [ 'type' => 'major' ] );
        $bonaventure->ideas()->attach( $rationalism->id, [ 'type' => 'major' ] );
        $bonaventure->ideas()->attach( $deontology->id, [ 'type' => 'minor' ] );
        $bonaventure->ideas()->attach( $jesusDeity->id, [ 'type' => 'minor' ] );
        $bonaventure->ideas()->attach( $scholasticism->id, [ 'type' => 'minor' ] );

        $jesusMereHumanity = Idea::query()->whereName( 'Jesus Mere Humanity' )
                                 ->whereGameId( $game->id )
                                 ->firstOrFail();
        $maimonedes        = Character::factory( [
            'name'  => 'Maimonedes',
            'era'   => 'Medieval',
            'level' => 5,
        ] )->for( $game )->create();
        $maimonedes->ideas()->attach( $classicalTheism->id, [ 'type' => 'major' ] );
        $maimonedes->ideas()->attach( $jesusMereHumanity->id, [ 'type' => 'minor' ] );
        $maimonedes->ideas()->attach( $scholasticism->id, [ 'type' => 'major' ] );

        $averroes = Character::factory( [
            'name'  => 'Averroes',
            'era'   => 'Medieval',
            'level' => 8,
        ] )->for( $game )->create();
        $averroes->ideas()->attach( $rationalism->id, [ 'type' => 'founding' ] );
        $averroes->ideas()->attach( $classicalTheism->id, [ 'type' => 'major' ] );
        $averroes->ideas()->attach( $hylomorphism->id, [ 'type' => 'major' ] );
        $averroes->ideas()->attach( $monarchy->id, [ 'type' => 'major' ] );
        $averroes->ideas()->attach( $jesusMereHumanity->id, [ 'type' => 'minor' ] );

        $avicenna = Character::factory( [
            'name'  => 'Avicenna',
            'era'   => 'Medieval',
            'level' => 8,
        ] )->for( $game )->create();
        $avicenna->ideas()->attach( $hylomorphism->id, [ 'type' => 'major' ] );
        $avicenna->ideas()->attach( $classicalTheism->id, [ 'type' => 'major' ] );
        $avicenna->ideas()->attach( $empiricism->id, [ 'type' => 'major' ] );
        $avicenna->ideas()->attach( $jesusMereHumanity->id, [ 'type' => 'minor' ] );
        $avicenna->ideas()->attach( $freeWill->id, [ 'type' => 'major' ] );
        $avicenna->ideas()->attach( $monarchy->id, [ 'type' => 'minor' ] );

        $determinism = Idea::query()->whereName( 'Determinism' )->whereGameId( $game->id )->firstOrFail();
        $alGhazali   = Character::factory( [
            'name'  => 'Al Ghazali',
            'era'   => 'Medieval',
            'level' => 4,
        ] )->for( $game )->create();
        $alGhazali->ideas()->attach( $classicalTheism->id, [ 'type' => 'major' ] );
        $alGhazali->ideas()->attach( $determinism->id, [ 'type' => 'major' ] );
        $alGhazali->ideas()->attach( $jesusMereHumanity->id, [ 'type' => 'minor' ] );

        $analyticism = Idea::query()->whereGameId( $game->id )->whereName( 'Analytic' )->create();
        $plantinga   = Character::factory( [
            'name'  => 'Alvin Plantinga',
            'era'   => 'Postmodern',
            'level' => 7,
        ] )->for( $game )->create();
        $plantinga->ideas()->attach( $theisticPersonalism->id, [ 'type' => 'founding' ] );
        $plantinga->ideas()->attach( $analyticism->id, [ 'type' => 'major' ] );
        $plantinga->ideas()->attach( $deontology->id, [ 'type' => 'minor' ] );

        $wlc = Character::factory( [
            'name'  => 'William Lane Craig',
            'era'   => 'Postmodern',
            'level' => 6,
        ] )->for( $game )->create();
        $wlc->ideas()->attach( $theisticPersonalism->id, [ 'type' => 'major' ] );
        $wlc->ideas()->attach( $analyticism->id, [ 'type' => 'major' ] );
        $wlc->ideas()->attach( $jesusDeity->id, [ 'type' => 'major' ] );
        $wlc->ideas()->attach( $freeWill->id, [ 'type' => 'minor' ] );
        $wlc->ideas()->attach( $nominalism->id, [ 'type' => 'minor' ] );
        $wlc->ideas()->attach( $deontology->id, [ 'type' => 'minor' ] );

        $continentalism = Idea::query()->whereGameId( $game->id )->whereName( 'Continental' )->create();
        $jpii           = Character::factory( [
            'name'  => 'John Paul II',
            'era'   => 'Postmodern',
            'level' => 6,
        ] )->for( $game )->create();
        $jpii->ideas()->attach( $virtueEthics->id, [ 'type' => 'major' ] );
        $jpii->ideas()->attach( $democracy->id, [ 'type' => 'major' ] );
        $jpii->ideas()->attach( $jesusDeity->id, [ 'type' => 'major' ] );
        $jpii->ideas()->attach( $continentalism->id, [ 'type' => 'minor' ] );
        $jpii->ideas()->attach( $hylomorphism->id, [ 'type' => 'minor' ] );

        $nihilism  = Idea::query()->whereGameId( $game->id )->whereName( 'Continental' )->create();
        $heidegger = Character::factory( [
            'name'  => 'Heidegger',
            'era'   => 'Postmodern',
            'level' => 5,
        ] )->for( $game )->create();
        $heidegger->ideas()->attach( $continentalism->id, [ 'type' => 'major' ] );
        $heidegger->ideas()->attach( $nihilism->id, [ 'type' => 'major' ] );
        $heidegger->ideas()->attach( $atheism->id, [ 'type' => 'minor' ] );

        $feser = Character::factory( [
            'name'  => 'Ed Feser',
            'era'   => 'Postmodern',
            'level' => 4,
        ] )->for( $game )->create();
        $feser->ideas()->attach( $hylomorphism->id, [ 'type' => 'major' ] );
        $feser->ideas()->attach( $classicalTheism->id, [ 'type' => 'major' ] );
        $feser->ideas()->attach( $virtueEthics->id, [ 'type' => 'major' ] );
        $feser->ideas()->attach( $scholasticism->id, [ 'type' => 'minor' ] );

        $mackie = Character::factory( [
            'name'  => 'J.L. Mackie',
            'era'   => 'Postmodern',
            'level' => 6,
        ] )->for( $game )->create();
        $mackie->ideas()->attach( $atheism->id, [ 'type' => 'major' ] );
        $mackie->ideas()->attach( $jesusMereHumanity->id, [ 'type' => 'major' ] );
        $mackie->ideas()->attach( $analyticism->id, [ 'type' => 'major' ] );
        $mackie->ideas()->attach( $atheism->id, [ 'type' => 'major' ] );

        $russell = Character::factory( [
            'name'  => 'Bertrand Russell',
            'era'   => 'Postmodern',
            'level' => 9,
        ] )->for( $game )->create();
        $russell->ideas()->attach( $atheism->id, [ 'type' => 'major' ] );
        $russell->ideas()->attach( $nihilism->id, [ 'type' => 'major' ] );
        $russell->ideas()->attach( $analyticism->id, [ 'type' => 'founding' ] );
        $russell->ideas()->attach( $nominalism->id, [ 'type' => 'major' ] );
        $russell->ideas()->attach( $determinism->id, [ 'type' => 'major' ] );
        $russell->ideas()->attach( $democracy->id, [ 'type' => 'minor' ] );

        $pruss = Character::factory( [
            'name'  => 'Alexander Pruss',
            'era'   => 'Postmodern',
            'level' => 7,
        ] )->for( $game )->create();
        $pruss->ideas()->attach( $classicalTheism->id, [ 'type' => 'major' ] );
        $pruss->ideas()->attach( $virtueEthics->id, [ 'type' => 'major' ] );
        $pruss->ideas()->attach( $analyticism->id, [ 'type' => 'major' ] );
        $pruss->ideas()->attach( $jesusDeity->id, [ 'type' => 'minor' ] );
        $pruss->ideas()->attach( $hylomorphism->id, [ 'type' => 'minor' ] );
        $pruss->ideas()->attach( $freeWill->id, [ 'type' => 'minor' ] );

        $alexRosenberg = Character::factory( [
            'name'  => 'Alex Rosenberg',
            'era'   => 'Postmodern',
            'level' => 4,
        ] )->for( $game )->create();
        $alexRosenberg->ideas()->attach( $atheism->id, [ 'type' => 'major' ] );
        $alexRosenberg->ideas()->attach( $nihilism->id, [ 'type' => 'major' ] );
        $alexRosenberg->ideas()->attach( $empiricism->id, [ 'type' => 'major' ] );
        $alexRosenberg->ideas()->attach( $materialism->id, [ 'type' => 'major' ] );
        $alexRosenberg->ideas()->attach( $analyticism->id, [ 'type' => 'minor' ] );
        $alexRosenberg->ideas()->attach( $determinism->id, [ 'type' => 'minor' ] );

        $dawkins = Character::factory( [
            'name'  => 'Richard Dawkins',
            'era'   => 'Postmodern',
            'level' => 3,
        ] )->for( $game )->create();
        $dawkins->ideas()->attach( $atheism->id, [ 'type' => 'major' ] );
        $dawkins->ideas()->attach( $nihilism->id, [ 'type' => 'minor' ] );
        $dawkins->ideas()->attach( $jesusMereHumanity->id, [ 'type' => 'major' ] );
        $dawkins->ideas()->attach( $materialism->id, [ 'type' => 'major' ] );
        $dawkins->ideas()->attach( $empiricism->id, [ 'type' => 'major' ] );

        $harris = Character::factory( [
            'name'  => 'Sam Harris',
            'era'   => 'Postmodern',
            'level' => 3,
        ] )->for( $game )->create();
        $harris->ideas()->attach( $atheism->id, [ 'type' => 'major' ] );
        $harris->ideas()->attach( $jesusMereHumanity->id, [ 'type' => 'minor' ] );
        $harris->ideas()->attach( $materialism->id, [ 'type' => 'major' ] );
        $harris->ideas()->attach( $empiricism->id, [ 'type' => 'major' ] );

        $swinburne = Character::factory( [
            'name'  => 'Richard Swinburne',
            'era'   => 'Postmodern',
            'level' => 6,
        ] )->for( $game )->create();
        $swinburne->ideas()->attach( $analyticism->id, [ 'type' => 'major' ] );
        $swinburne->ideas()->attach( $theisticPersonalism->id, [ 'type' => 'major' ] );
        $swinburne->ideas()->attach( $deontology->id, [ 'type' => 'major' ] );
        $swinburne->ideas()->attach( $freeWill->id, [ 'type' => 'minor' ] );

        $sartre = Character::factory( [
            'name'  => 'Jean Paul Sartre',
            'era'   => 'Postmodern',
            'level' => 8,
        ] )->for( $game )->create();
        $sartre->ideas()->attach( $freeWill->id, [ 'type' => 'major' ] );
        $sartre->ideas()->attach( $continentalism->id, [ 'type' => 'major' ] );
        $sartre->ideas()->attach( $nihilism->id, [ 'type' => 'major' ] );
        $sartre->ideas()->attach( $atheism->id, [ 'type' => 'major' ] );
        $sartre->ideas()->attach( $jesusMereHumanity->id, [ 'type' => 'minor' ] );

    }
}
