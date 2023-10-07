<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Idea;
use App\Models\Player;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder {
    public function run(): void {
        $game    = Game::factory()->create();
        $player1 = Player::factory()->for( $game )->create();
        $player2 = Player::factory()->for( $game )->create();
        $player3 = Player::factory()->for( $game )->create();

        $theism = 'Theism';
        $jesus  = 'Jesus';

        $classicalTheism = Idea::factory( [
            'name'     => 'Classical Theism',
            'category' => $theism
        ] )->for( $game )->create();
        $atheism         = Idea::factory( [
            'name'     => 'Atheism',
            'category' => $theism
        ] )->for( $game )->create();

        $jesusMan = Idea::factory( [
            'name'     => 'Jesus Mere Humanity',
            'category' => $jesus
        ] )->for( $game )->create();
        $jesusGod = Idea::factory( [
            'name'     => 'Jesus Deity',
            'category' => $jesus
        ] )->for( $game )->create();

        $p1JesusGod = Transaction::factory( [
            'amount' => 5,
        ] )->for( $game )->for( $player1 )->for( $jesusGod )->create();

        //should be doubled by p2
        $p2JesusMan = Transaction::factory( [
            'amount' => 10,
        ] )->for( $game )->for( $player2 )->for( $jesusMan )->create();

        //Should be doubled by p3
        $p3Atheism = Transaction::factory( [
            'amount' => 7,
        ] )->for( $game )->for( $player3 )->for( $atheism )->create();

        $p1Theism = Transaction::factory( [
            'amount' => 5,
        ] )->for( $game )->for( $player1 )->for( $classicalTheism )->create();

        //Should not be counted for p1
        $p1Atheism = Transaction::factory( [
            'amount' => 3,
        ] )->for( $game )->for( $player1 )->for( $atheism )->create();

        //Should be doubled for p2
        $p2Atheism = Transaction::factory( [
            'amount' => 4
        ] )->for( $game )->for( $player2 )->for( $atheism )->create();

    }
}
