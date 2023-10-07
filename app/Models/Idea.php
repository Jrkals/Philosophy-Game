<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model {
    use HasFactory;

    public $casts = [
        'winner' => 'boolean'
    ];

    public function game(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo( Game::class );
    }

    public function setWinner( $status ): void {
        $this->winner = $status;
        $this->save();
    }
}
