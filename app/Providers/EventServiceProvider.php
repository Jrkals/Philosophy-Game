<?php

namespace App\Providers;

use App\Events\PlayerAdded;
use App\Listeners\AddPlayer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider {
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class  => [
            SendEmailVerificationNotification::class,
        ],
        PlayerAdded::class => [
            AddPlayer::class,
            'handle'
        ],
//        'native:' . PlayerAdded::class => [
//            AddPlayer::class,
//            'handle'
//        ],
        // 'native:' . \Native\Laravel\Events\Windows\WindowFocused::class => [ AddPlayer::class, 'handle' ],

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void {
//        Event::listen( PlayerAdded::class, function () {
//            echo "here";
//        } );

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool {
        return false;
    }
}
