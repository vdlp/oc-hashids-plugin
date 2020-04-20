<?php

/** @noinspection PhpMissingParentCallCommonInspection */

declare(strict_types=1);

namespace Vdlp\Hashids;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
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

    public function register(): void
    {
        $this->app->register(ServiceProvider::class);
    }
}
