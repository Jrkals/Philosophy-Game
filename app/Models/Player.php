<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model {
    use HasFactory;

    public function game(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo( Game::class );
    }

    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany( Transaction::class );
    }
}
