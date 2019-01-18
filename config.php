<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Hashid Configuration
    |--------------------------------------------------------------------------
    |
    | This option controls the default configuration that gets used while
    | using this hashids plugin. This configuration is used when another is
    | not explicitly specified.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Hashid Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the hashid "configurations" for
    | your application.
    |
    */

    'configurations' => [
        'main' => [
            'salt' => 'insert-salt-string-here',
            'length' => 10,
        ],

        'different-configuration' => [
            'salt' => 'insert-different-salt-string-here',
            'length' => 100,
            'alphabet' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890', # Default alphabet
        ],
    ],
];
