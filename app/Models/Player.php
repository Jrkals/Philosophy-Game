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
            if ( ! isset( $ideaSubTotals[ $transaction->idea->name ] ) ) {
                $ideaSubTotals[ $transaction->idea->name ] = $transaction->total;
            } else {
                $ideaSubTotals[ $transaction->idea->name ] += $transaction->total;
            }
        }

        foreach ( $ideaSubTotals as $ideaName => $total ) {
            $category = Idea::getCategoryForName( $ideaName );
            if ( empty( $categoryLead[ $category ] ) ) {
                $categoryLead[ $category ] = $ideaName;
            } else {
                if ( $total > $ideaSubTotals[ $categoryLead[ $category ] ] ) {
                    $categoryLead[ $category ] = $ideaName;
                }
            }
        }
        $this->adjusted = $this->total;

        foreach ( $this->transactions as $transaction ) {
            $a = $categoryLead[ $transaction->idea->category ];
            $b = $transaction->idea->name;
            if ( $categoryLead[ $transaction->idea->category ] !== $transaction->idea->name ) {
                $this->adjusted -= $transaction->amount;
                continue;
            }
            if ( $transaction->idea->winner ) {
                $this->adjusted += $transaction->amount;
            }
        }

        $this->save();

    }

    public function summonCharacter( Character $character ): void {
        foreach ( $character->ideas as $idea ) {
            $transaction = new Transaction( [
                'game_id'   => $character->game_id,
                'idea_id'   => $idea->id,
                'amount'    => $this->getIdeaAmount( $idea->pivot->type ),
                'player_id' => $this->id,
                'round'     => $character->game->round,
                'turn'      => $character->game->turn,
            ] );
            $transaction->save();
        }
    }

    public function getIdeaAmount( string $type ): int {
        switch ( $type ) {
            case 'founding':
                return 20;
            case 'major':
                return 10;
            case 'minor':
                return 5;
        }
    }
}
