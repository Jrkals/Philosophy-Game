<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Character extends Model {
    use HasFactory;

    public function ideas(): BelongsToMany {
        return $this->belongsToMany( Idea::class, 'character_ideas' )->withPivot( 'type' );
    }

    public function game(): BelongsTo {
        return $this->belongsTo( Game::class );
    }
}
