<?php

namespace App\Nova\Actions;

use App\Models\Transaction;
use Database\Seeders\IdeaSeeder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Actions\DestructiveAction;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class NextTurn extends Action {
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
        $game = $models->first();
        $game->current_turn ++;
        if ( $game->current_turn % $game->players->count() === 1 ) {
            $game->current_round += 1;
        }
        $game->save();
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
