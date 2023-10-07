<?php

namespace App\Nova\Actions;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class refreshScore extends Action {
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param \Laravel\Nova\Fields\ActionFields $fields
     * @param \Illuminate\Support\Collection $models
     *
     * @return mixed
     */
    public function handle( ActionFields $fields, Collection $models ) {
        $game               = $models->first();
        $recentTransactions = Transaction::query()->where( 'counted', false )->get();
        foreach ( $recentTransactions as $transaction ) {
            if ( $transaction->player ) {
                $transaction->player->total += $transaction->amount;
                $transaction->player->save();
            }
            $transaction->idea->points += $transaction->amount;
            $transaction->counted      = true;
            $transaction->save();
            $transaction->idea->save();
        }
        $categoryWinnerPoints = []; //Category -> total
        $categoryWinnerIdeas  = []; //Category -> idea

        foreach ( $game->ideas as $idea ) {
            if ( $idea->winner === true ) {
                $idea->winner = false;
                $idea->save();
            }
            if ( empty( $categoryWinnerIdeas[ $idea->category ] ) || $idea->points > $categoryWinnerPoints[ $idea->category ] ) {
                $categoryWinnerPoints[ $idea->category ] = $idea->points;
                $categoryWinnerIdeas[ $idea->category ]  = $idea;
            }
        }
        foreach ( $categoryWinnerIdeas as $category_winner_idea ) {
            $category_winner_idea->winner = true;
            $category_winner_idea->save();
        }


    }

    /**
     * Get the fields available on the action.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function fields( NovaRequest $request ) {
        return [];
    }
}
