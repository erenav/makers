<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Publish Configs.
    |--------------------------------------------------------------------------
    |
    | The values related to publishing makers stubs.
    |
    */

    'publish' => [
        'path' => 'stubs/makers'
    ],

    /*
    |--------------------------------------------------------------------------
    | Makeable Classes
    |--------------------------------------------------------------------------
    |
    | The values that correlate to the different classes
    | that can be made using the 'makers' commands.
    |
    */

    'makes' => [
        'action' => [
            'namespace' => 'Actions',
            'postfix' => 'Action',
            'stubs' => [
                'standard' => 'action.stub',
            ],
        ],
        'dto' => [
            'namespace' => 'DTOs',
            'postfix' => 'Data',
            'stubs' => [
                'standard' => 'dto.stub',
                'readonly' => 'dto-readonly.stub',
            ],
        ],
        'enum' => [
            'namespace' => 'Enums',
            'postfix' => 'Enum',
            'stubs' => [
                'standard' => 'enum.stub',
                'backed' => 'enum-backed.stub',
            ],
        ],
        'macros' => [
            'namespace' => 'Macros',
            'postfix' => 'Macros',
            'stubs' => [
                'standard' => 'macro.stub',
            ],
        ],
        'mixin' => [
            'namespace' => 'Mixins',
            'postfix' => 'Mixins',
            'stubs' => [
                'standard' => 'mixin.stub',
            ],
        ],
        'pipe' => [
            'namespace' => 'Pipes',
            'postfix' => 'Pipe',
            'stubs' => [
                'standard' => 'pipe.stub',
            ],
        ],
        'states' => [
            'namespace' => 'States',
            'postfix' => '',
            'stubs' => [
                'standard' => 'base-state.stub',
            ],
        ],
        'state' => [
            'namespace' => 'States',
            'postfix' => '',
            'stubs' => [
                'standard' => 'state.stub',
            ],
        ],
        'value' => [
            'namespace' => 'ValueObjects',
            'postfix' => '',
            'stubs' => [
                'standard' => 'value-object.stub',
            ],
        ],
    ],
];
