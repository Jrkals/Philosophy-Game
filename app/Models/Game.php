<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model {
    use HasFactory;

    public function players(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany( Player::class );
    }

    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany( Transaction::class );
    }

    public function ideas(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany( Idea::class );
    }

    public function calculateScore(): void {
        $recentTransactions = Transaction::query()->where( 'counted', false )->get();
        foreach ( $recentTransactions as $transaction ) {
            if ( $transaction->player ) {
                $transaction->countTransactionToPlayer();
            }
            $transaction->countTransactionToIdea();
        }
        $categoryWinnerPoints = []; //Category -> total
        $categoryWinnerIdeas  = []; //Category -> idea

        foreach ( $this->ideas as $idea ) {
            if ( $idea->winner === true ) {
                $idea->setWinner( false );
            }
            if ( empty( $categoryWinnerIdeas[ $idea->category ] ) || $idea->points > $categoryWinnerPoints[ $idea->category ] ) {
                $categoryWinnerPoints[ $idea->category ] = $idea->points;
                $categoryWinnerIdeas[ $idea->category ]  = $idea;
            }
        }
        foreach ( $categoryWinnerIdeas as $category_winner_idea ) {
            $category_winner_idea->setWinner( true );
        }

        foreach ( $this->players as $player ) {
            $player->calculateAdjustedPointsTotal();
        }
    }
}
