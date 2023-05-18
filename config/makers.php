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
            'postfix' => '',
            'stubs' => [
                'generic' => 'actions-basic.stub',
            ],
        ],
        'dto' => [
            'namespace' => 'DTOs',
            'postfix' => 'Data',
            'stubs' => [
                'basic' => 'dtos-basic.stub',
                'readonly' => 'dtos-readonly.stub',
            ],
        ],
        'enum' => [
            'namespace' => 'Enums',
            'postfix' => 'Enum',
            'stubs' => [
                'basic' => 'enums-basic.stub',
                'backed' => 'enums-backed.stub',
            ],
        ],
        'generic-factory' => [
            'namespace' => 'Factories',
            'postfix' => 'Factory',
            'stubs' => [
                'generic' => 'factories-generic.stub',
            ],
        ],
        'macros' => [
            'namespace' => 'Macros',
            'postfix' => 'Macros',
            'stubs' => [
                'basic' => 'macros-basic.stub',
            ],
        ],
        'pipe' => [
            'namespace' => 'Pipes',
            'postfix' => 'Pipe',
            'stubs' => [
                'generic' => 'pipes-basic.stub',
            ],
        ],
        'state' => [
            'namespace' => 'States',
            'postfix' => '',
            'stubs' => [
                'abstract' => 'states-abstract.stub',
            ],
        ],
        'state-implementation' => [
            'namespace' => 'States',
            'postfix' => '',
            'stubs' => [
                'implementation' => 'states-implementation.stub',
            ],
        ],
        'state-transition' => [
            'namespace' => 'Transitions',
            'postfix' => 'Transition',
            'stubs' => [
                'basic' => 'transitions-basic.stub',
            ],
        ],
    ],
];
