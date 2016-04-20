<?php

return [
    'database' => [
        'table' => [
            'name' => 'users',
            'field' => 'birthday',
        ],
    ],
    /*
     * This field controls birthday for 29/2 birthed people for years % 4 != 0.
     * Possible values are '28february', 'every4years', '1march'.
     * Default: '28february'.
     * */
    'leapday' => '28february',
];