<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function player(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Player::class);
    }

    public function idea(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Idea::class);
    }

    public function game(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Game::class);
    }
}
