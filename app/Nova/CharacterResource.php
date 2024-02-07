<?php

namespace App\Nova;

use App\Models\Character;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class CharacterResource extends Resource {
    public static $model = Character::class;
    public static $perPageViaRelationship = 45;

    /**
     * @inheritDoc
     */
    public function fields( NovaRequest $request ) {
        return [
            ID::make()->hideFromIndex(),
            Text::make( 'Name' ),
            Text::make( 'Era' ),
            Text::make( 'Level' ),
            BelongsTo::make( 'Game', 'game', Game::class ),
            BelongsToMany::make( 'Ideas', 'ideas', Idea::class ),
        ];
    }
}