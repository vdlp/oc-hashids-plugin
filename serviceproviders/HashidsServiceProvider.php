<?php

declare(strict_types=1);

namespace Vdlp\Hashids\ServiceProviders;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use October\Rain\Support\ServiceProvider;
use Vdlp\Hashids\Classes\HashidsFactory;
use Vdlp\Hashids\Classes\HashidsManager;

/**
 * Class HashidsServiceProvider
 *
 * @package Vdlp\Hashids\ServiceProviders
 */
class HashidsServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config.php' => config_path('hashids.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__ . '/../config.php', 'hashids');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(HashidsFactory::class, function (): HashidsFactory {
            return new HashidsFactory();
        });

        $this->app->singleton(HashidsManager::class, function (Container $container): HashidsManager {
            return new HashidsManager(
                $container->make(Repository::class),
                $container->make(HashidsFactory::class)
            );
        });
    }
}
