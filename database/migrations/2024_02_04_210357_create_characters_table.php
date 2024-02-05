<?php

use App\Models\Character;
use App\Models\Game;
use App\Models\Idea;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create( 'characters', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'name' );
            $table->integer( 'level' );
            $table->string( 'era' );
            $table->foreignIdFor( Game::class );
            $table->timestamps();
        } );

        Schema::create( 'character_ideas', function ( Blueprint $table ) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor( Character::class );
            $table->foreignIdFor( Idea::class );
            $table->enum( 'type', [ 'founding', 'major', 'minor' ] );
        } );
    }

    public function down(): void {
        Schema::dropIfExists( 'characters' );
    }
};
