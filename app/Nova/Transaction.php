<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Transaction extends Resource {
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\Transaction::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';
    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'turn',
        'round'
    ];

    public static $perPageViaRelationship = 25;


    public static function relatableQuery( NovaRequest $request, $query ) {
        return $query->where( 'game_id', '=', $request->query( 'viaResourceId' ) )
                     ->orWhere( 'game_id', '=', $request->viaResourceId );
        //->orWhere( 'player_id', '=', $request->query( 'viaResourceId' ) );
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function fields( NovaRequest $request ) {
        return [
            ID::make()->sortable(),

            Number::make( 'Round', 'round' )->default( Game::fetchCurrentRound( 'round' ) ),
            Number::make( 'Turn', 'turn' )->default( Game::fetchCurrentRound( 'turn' ) ),
            Number::make( 'Amount', 'amount' ),
            BelongsTo::make( 'Game' ),
            BelongsTo::make( 'Idea' ),
            BelongsTo::make( 'Player' )->nullable(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function cards( NovaRequest $request ) {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function filters( NovaRequest $request ) {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function lenses( NovaRequest $request ) {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function actions( NovaRequest $request ) {
        return [];
    }
}
