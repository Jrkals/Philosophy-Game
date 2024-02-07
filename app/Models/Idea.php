<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Idea extends Model {
    use HasFactory;

    public $casts = [
        'winner' => 'boolean'
    ];
    protected $fillable = [
        'game_id',
        'name',
        'category'
    ];

    public static function getCategoryForName( string $name ) {
        return Idea::query()->where( 'name', $name )->first()->category;
    }

    public function game(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo( Game::class );
    }

    public function setWinner( $status ): void {
        $this->winner = $status;
        $this->save();
    }

    public function characters(): BelongsToMany {
        return $this->belongsToMany( Character::class, 'character_ideas' )->withPivot( 'type' );
    }
}
