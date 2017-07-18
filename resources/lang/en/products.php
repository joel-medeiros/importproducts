<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 24/06/17
 * Time: 19:23
 */


return [
    'title' => '{1} Product|[1,Inf] Products',
    'labels' => [
        'description' => 'Description',
        'active'    => 'Active',
        'inactive'  => 'Inactive'
    ],
    'table' => [
        'lm' => 'LM',
        'status' => 'Status',
    ],
    'buttons' => [
        'active'    => 'Active',
        'inactive'  => 'Inactive',
        'confirm'   => 'Are you sure that you want <strong>:status</strong> the product <strong>:item</strong>?'
    ],
    'responses' => [
        'toggle' => [
            'fail' => 'The product :item can\'t be :status',
            'success' => 'The product :item was :status successfully!'
        ]
    ]
];
