<?php

namespace NickStrohm\laravel_ts3_php_framework\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use TeamSpeak3;

class TeamspeakServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstraps any application services.
     *
     * @return void
     */
    public function boot() {
        $this->publishes([
            dirname(__DIR__) . '/teamspeak.php' => config_path('teamspeak.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TeamSpeak3::class, function ($app) {
            $uri = sprintf("serverquery://%s:%s@%s:%d/?timeout=%d&server_port=%d&client_name=%s",
                config('teamspeak.query.username'), config('teamspeak.query.password'),
                config('teamspeak.host'), config('teamspeak.query.port'),
                config('teamspeak.timeout'), config('teamspeak.port'), config('teamspeak.nickname')
            );

            return TeamSpeak3::factory($uri);
        });
    }

    /**
     * Get the services provided by the provider
     *
     * @return array
     */
    public function provides()
    {
        return [\TeamSpeak3_Node_Server::class];
    }
}