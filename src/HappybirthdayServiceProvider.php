<?php

namespace Willypuzzle\Happybirthday;

use Illuminate\Support\ServiceProvider;

class HappybirthdayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__.'/config/happybirthday.php' => config_path('happybirthday.php'),
            'config'
        ]);

        $this->publishes([
            __DIR__.'database' => database_path('/'),
            'database'
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        require_once(__DIR__.'/Providers/Main.php');

        App::singleton('Happybirthday', function($app)
        {
            return new Main();
        });
    }
}
