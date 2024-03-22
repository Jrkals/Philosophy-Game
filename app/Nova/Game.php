<?php

namespace App\Nova;

use App\Nova\Actions\NextRound;
use App\Nova\Actions\NextTurn;
use App\Nova\Actions\refreshScore;
use App\Nova\Actions\SeedIdeas;
use App\Nova\Actions\SummonCharacter;
use App\Nova\Metrics\Round;
use App\Nova\Metrics\Turn;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Game extends Resource {
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\Game::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name'
    ];

    public static function relatableQuery( NovaRequest $request, $query ) {
        if ( $request->query( 'viaResource' ) === 'players' ) {
            $player = \App\Models\Player::query()->find( $request->query( 'viaResourceId' ) );

            return $query->find( $player->game_id );
        }

    }

    public static function fetchCurrentRound( string $string ) {
        $game = \App\Models\Game::query()->latest()->first();
        if ( $string === 'round' ) {
            return $game->current_round;
        }

        return $game->current_turn;
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
            Text::make( 'Name' )->sortable(),
            Number::make( 'Current Turn' )->default( 1 ),
            Number::make( 'Current Round' )->default( 1 ),
            HasMany::make( 'Players' ),
            HasMany::make( 'Transactions' ),
            HasMany::make( 'Ideas' ),
            HasMany::make( 'Characters', 'characters', CharacterResource::class ),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function cards( NovaRequest $request ): array {
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
        return [ new refreshScore, new SeedIdeas, new NextTurn ];
    }
}
