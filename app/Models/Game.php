<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function players(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Player::class);
    }

    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Transaction::class);
    }

    public function ideas(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Idea::class);
    }
}
