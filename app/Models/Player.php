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

    public function calculateAdjustedPointsTotal(): void {
        $ideaSubTotals = []; //idea -> total
        $categoryLead  = []; //category -> idea

        foreach ( $this->transactions as $transaction ) {
            if ( empty( $ideaSubTotals[ $transaction->idea ] ) ) {
                $ideaSubTotals[ $transaction->idea ] = $transaction->total;
            } else {
                $ideaSubTotals[ $transaction->idea ] += $transaction->total;
            }
        }

        foreach ( $ideaSubTotals as $idea => $total ) {
            if ( empty( $categoryLead[ $idea->category ] ) ) {
                $categoryLead[ $idea->category ] = $idea;
            } else {
                if ( $total > $ideaSubTotals[ $idea->category ] ) {
                    $categoryLead[ $idea->category ] = $idea;
                }
            }
        }
        $this->adjusted = $this->total;

        foreach ( $this->transactions as $transaction ) {
            if ( $categoryLead[ $transaction->idea->category ] !== $transaction->idea ) {
                $this->adjusted -= $transaction->amount;
            }
            if ( $transaction->idea->winner ) {
                $this->adjusted += $transaction->amount;
            }
        }

        $this->save();

    }
}
