<?php
namespace Shmelevdi\LifebitIdClientPhp\Providers;

use Illuminate\Support\ServiceProvider;

class LifebitIDServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //$this->loadViewsFrom(base_path('resources/views/LifebitID'), 'LifebitID');



        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\CheckClientCommand::class,
                Console\ServerHealth::class,
                Console\InstallCommand::class,
                Console\PurgeCommand::class,
            ]);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(config_path('LifebitID.php'), 'LifebitID');

        LifebitID::setClientUuids($this->app->make(Config::class)->get('LifebitID.client_uuids', false));

        $this->registerAuthorizationServer();
        $this->registerClientRepository();
        $this->registerJWTParser();
        $this->registerResourceServer();
        $this->registerGuard();
    }
}
