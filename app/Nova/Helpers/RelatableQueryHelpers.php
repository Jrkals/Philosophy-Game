<?php

namespace App\Nova\Helpers;

use App\Nova\Player;
use Laravel\Nova\Http\Requests\NovaRequest;

class RelatableQueryHelpers {
    public static function handlePlayerResource( NovaRequest $request, $query ) {
        $player = \App\Models\Player::query()->find( $request->query( 'viaResourceId' ) );
        if ( ! $player ) {
            $player = \App\Models\Player::query()->find( $request->request->get( 'viaResourceId' ) );
        }

        return $query->whereGameId( $player->game_id );
    }
}