<?php

declare(strict_types=1);

namespace Vdlp\Hashids;

use System\Classes\PluginBase;
use Vdlp\Hashids\ServiceProviders\HashidsServiceProvider;

/**
 * Class Plugin
 *
 * @package Vdlp\Redirect
 */
class Plugin extends PluginBase
{
    /**
     * {@inheritdoc}
     */
    public function pluginDetails(): array
    {
        return [
            'name' => 'vdlp.hashids::lang.plugin.name',
            'description' => 'vdlp.hashids::lang.plugin.description',
            'author' => 'Van der Let & Partners <octobercms@vdlp.nl>',
            'icon' => 'icon-link',
            'homepage' => 'https://octobercms.com/plugin/vdlp-hashids',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function register(): void
    {
        $this->app->register(HashidsServiceProvider::class);
    }
}
