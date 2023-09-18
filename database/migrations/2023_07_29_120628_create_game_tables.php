<?php

use App\Models\Game;
use App\Models\Idea;
use App\Models\Player;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'games', function ( Blueprint $table ) {
            $table->id();
            $table->timestamps();
            $table->string( 'name' );
            $table->integer( 'current_turn' )->default( 0 );
            $table->integer( 'current_round' )->default( 0 );
        } );
        Schema::create( 'players', function ( Blueprint $table ) {
            $table->id();
            $table->timestamps();
            $table->string( 'name' );
            $table->foreignIdFor( Game::class );
            $table->integer( 'total' );
            $table->integer( 'adjusted' );
        } );
        Schema::create( 'ideas', function ( Blueprint $table ) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor( Game::class );
            $table->string( 'name' );
            $table->string( 'category' );
            $table->integer( 'points' );
            $table->boolean( 'winner' );
        } );
        Schema::create( 'transactions', function ( Blueprint $table ) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor( Game::class );
            $table->foreignIdFor( Player::class )->nullable();
            $table->foreignIdFor( Idea::class );
            $table->integer( 'round' );
            $table->integer( 'turn' );
            $table->integer( 'amount' );
            $table->boolean( 'counted' )->default( false );
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'game_tables' );
    }
};
