<?php

namespace App\Nova\Actions;

use App\Models\Character;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class SummonCharacter extends Action {

    public function handle( ActionFields $fields, Collection $models ) {
        $player    = $models->first();
        $character = Character::query()->whereName( $fields->name )->firstOrFail();
        $player->summonCharacter( $character );
    }

    public function fields( NovaRequest $request ) {
        return [
            Text::make( 'Name' ),
        ];
    }
}
