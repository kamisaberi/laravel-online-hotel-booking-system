<?php


return [

    'operators' => [
        'eq',
        'neq',
        'lt',
        'lte',
        'gt',
        'gte',
        'bt',
        'in',
        'all',
    ],


    'input_type_operators' => [
        'text' => ['eq', 'neq', 'in'],
        'textarea' => ['eq', 'neq', 'in'],
        'tinymce' => ['eq', 'neq', 'in'],
        'number' => ['eq', 'neq', 'lt', 'lte', 'gt', 'gte', 'bt'],
        'nestable' => ['in', 'all'],
    ],


];
