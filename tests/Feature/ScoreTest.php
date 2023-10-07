<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Game;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScoreTest extends TestCase {
    use RefreshDatabase;

    protected $seed = true;

    //Test Caculate Points

    public function testCalculatePoints() {
        $game = Game::query()->first();
        $game->calculateScore();

        $this->assertDatabaseHas( 'ideas', [
            'name'   => 'Atheism',
            'winner' => true,
            'points' => 14
        ] );

        $this->assertDatabaseHas( 'ideas', [
            'name'   => 'Classical Theism',
            'winner' => false,
            'points' => 5
        ] );

        $this->assertDatabaseHas( 'ideas', [
            'name'   => 'Jesus Deity',
            'winner' => false,
            'points' => 5
        ] );

        $this->assertDatabaseHas( 'ideas', [
            'name'   => 'Jesus Mere Humanity',
            'winner' => true,
            'points' => 10
        ] );

        $this->assertDatabaseHas( 'players', [
            'id'       => 1,
            'total'    => 13,
            'adjusted' => 10
        ] );
        $this->assertDatabaseHas( 'players', [
            'id'       => 2,
            'total'    => 14,
            'adjusted' => 28
        ] );
        $this->assertDatabaseHas( 'players', [
            'id'       => 3,
            'total'    => 7,
            'adjusted' => 14
        ] );
    }

    protected function setUp(): void {
        parent::setUp();
        $this->seed( TestSeeder::class );
    }
}
