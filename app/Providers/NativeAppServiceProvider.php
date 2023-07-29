<?php

namespace App\Providers;

use Native\Laravel\Facades\ContextMenu;
use Native\Laravel\Facades\Dock;
use Native\Laravel\Facades\Window;
use Native\Laravel\Facades\GlobalShortcut;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider {
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void {
        Menu::new()
            ->submenu( 'My Submenu',
                Menu::new()
                    ->event( App\Events\AddPlayer::class, 'Add Player' ) )
            ->register();

        Window::open()
              ->width( 800 )
              ->height( 800 );

        /**
         * Dock::menu(
         * Menu::new()
         * ->event(DockItemClicked::class, 'Settings')
         * ->submenu('Help',
         * Menu::new()
         * ->event(DockItemClicked::class, 'About')
         * ->event(DockItemClicked::class, 'Learn More…')
         * )
         * );
         *
         * ContextMenu::register(
         * Menu::new()
         * ->event(ContextMenuClicked::class, 'Do something')
         * );
         *
         * GlobalShortcut::new()
         * ->key('CmdOrCtrl+Shift+I')
         * ->event(ShortcutPressed::class)
         * ->register();
         */
    }
}
