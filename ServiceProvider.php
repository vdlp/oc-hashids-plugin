<?php

declare(strict_types=1);

namespace Vdlp\Hashids;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use October\Rain\Support\ServiceProvider as BaseServiceProvider;
use Vdlp\Hashids\Classes\HashidsFactory;
use Vdlp\Hashids\Classes\HashidsManager;

class ServiceProvider extends BaseServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('hashids.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__ . '/config.php', 'hashids');
    }

    public function register(): void
    {
        $this->app->singleton(HashidsFactory::class, static function (): HashidsFactory {
            return new HashidsFactory();
        });

        $this->app->singleton(HashidsManager::class, static function (Container $container): HashidsManager {
            return new HashidsManager(
                $container->make(Repository::class),
                $container->make(HashidsFactory::class)
            );
        });
    }
}
