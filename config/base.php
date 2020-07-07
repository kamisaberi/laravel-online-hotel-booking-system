<?php


return [

    'convert_types_map' => [
        'varchar' => 'text',
        'longtext' => 'text',
        'int' => 'number',
    ],

    "built_in_methods" => [
        'now',
    ],

    "arithmetic_operators" => [
        "+",
        "-",
        "*",
        "/",
        "%",
    ],

    "comparison_operators" => [
        '==',
        '>=',
        '<=',
        '!=',
        '>',
        '<'
    ],

    "logical_operators" => [
        '&&',
        '||',
    ],

    "months" => [
        'Jan' => 1,
        "Feb" => 2,
        'Mar' => 3,
        "Apr" => 4,
        'May' => 5,
        "Jun" => 6,
        'Jul' => 7,
        "Aug" => 8,
        'Sep' => 9,
        "Oct" => 10,
        'Nov' => 11,
        "Dec" => 12,
    ],


    'weekdays' => [
        'Saturday',
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday'
    ],

    'image_sizes' => [
        '160x160' => [160, 160],
        '200x200' => [200, 200],
        '320x50' => [320, 50],
        '300x250' => [300, 250],
        '480x360' => [480, 360],
        '160x600' => [160, 600],
        '728x90' => [728, 90],
        '120x600' => [120, 600],
        '336x280' => [336, 280],
        '1024x768' => [1024, 768],
    ],


    'conversation_types' => [
        'conversation' => 1,
        'message' => 2,
        'comment' => 3,
        'complaint' => 4,
        'rating' => 5,
    ],

    'communication_types' => [
        'email' => 1,
        'sms' => 2,
        'external-chat-system' => 3,
    ],

    'data_types' => [

        'hotel' => 1,
        'room' => 2,
        'website' => 3,
        'application' => 4,
        'coffee-shop' => 5,
        'restaurant' => 6,
        'map' => 7,
        'map-location' => 8,
        'news' => 9,

    ],
    'user_types' => [
        'user' => 1,
        'customer' => 2,
    ],
    'service_types' => [
        'reserve' => 1,
        'customer' => 2,
    ],

    'relation_types' => [
        'general' => 1,
        'offer' => 2,
        'price' => 5,
    ],

    'document_types' => [
        'gallery' => 1,
        'general' => 2,
        'main-slide-show' => 3,
        'second-slide-show' => 4,
        'pages' => 5,
        'contact-us' => 6,
        'about-us' => 7,
        'rules' => 8,
        'check' => 9,
        'complaints' => 10,
        'video' => 22,
        'swf' => 23,
    ],

    'object_types' => [
        'data' => 1,
        'user' => 2,
        'service' => 3,
        'document' => 4,
        'relation' => 5,
        'data_assigned_property' => 6,
        'service_assigned_property' => 7,
        'user_assigned_property' => 8,
        'document_assigned_property' => 9,
        'conversation' => 10,
        'conversation_assigned_property' => 11,
        'communication' => 12,
        'communication_assigned_property' => 13,
        'relation_assigned_property' => 14,
    ],


    'RDBMS' => [


        'base_types' => [
            'data' => 'data',
            'documents' => 'documents',
            'conversations' => 'conversations',
            'navigations' => 'navigations',
            'services' => 'services',
            'users' => 'users',
        ],


        'tables' => [

            'data' => [
                'types' => 'data_types',
                'items' => 'data',
                'properties' => 'data_properties',
                'assigned' => 'data_assigned_properties',
                'values' => 'data_property_values',
                'assigned_values' => 'data_assigned_property_values',
            ],

            'documents' => [
                'types' => 'document_types',
                'items' => 'documents',
                'properties' => 'document_properties',
                'assigned' => 'document_assigned_properties',
                'values' => 'document_property_values',
                'assigned_values' => 'document_assigned_property_values',
            ],

            'conversations' => [
                'types' => 'conversation_types',
                'items' => 'conversations',
                'properties' => 'conversation_properties',
                'assigned' => 'conversation_assigned_properties',
                'values' => 'conversation_property_values',
                'assigned_values' => 'conversation_assigned_property_values',
            ],


            'navigations' => [
                'types' => 'navigations',
                'items' => 'navigation_items',
                'properties' => 'navigation_item_properties',
                'assigned' => 'navigation_item_assigned_properties',
                'values' => 'navigation_item_property_values',
                'assigned_values' => 'navigation_item_assigned_property_values',
            ],


            'services' => [
                'types' => 'service_types',
                'items' => 'services',
                'properties' => 'service_properties',
                'assigned' => 'service_assigned_properties',
                'values' => 'service_property_values',
                'assigned_values' => 'service_assigned_property_values',
            ],


            'users' => [
                'types' => 'user_types',
                'items' => 'users',
                'properties' => 'user_properties',
                'assigned' => 'user_assigned_properties',
                'values' => 'user_property_values',
                'assigned_values' => 'user_assigned_property_values',
            ],


            'input_types' => [

                'text' => 'text',
                'array-text' => 'array-text',
                'summernote' => 'summernote',
                'date' => 'date',
                'number' => 'number',
                'check' => 'check',
                'select' => 'select',
                'currency' => 'currency',
                'file' => 'file',
                'cropper' => 'cropper',
                'select-template' => 'select-template',
                'select-navigation' => 'select-navigation',
                'multi_upload' => 'multi_upload',
                'array-date' => 'array-date',
                'multi-check' => 'multi-check',
                'multi-text' => 'multi-text',
                'documents:general' => 'documents:general',
                'single-relation-price' => 'single-relation-price',
            ],

        ],
    ],

    'locales' => [
        'en',
        'ar'
    ],

    'all_locales' => [
        'fa',
        'en',
        'ar'
    ],

    'locales_and_flags' => [
        'fa' => 'flag-icon-ir',
        'en' => 'flag-icon-gb',
        'ar' => 'flag-icon-sa'
    ],

    'rtl_locales' => [
        'ar',
        'dv',
        'he',
        'fa',
        'ur',
        'ku',
    ],


    'image_extensions' => [
        'jpg',
        'jpeg',
        'gif',
        'png',
        'bmp',
        'svg',
        'svgz',
        'cgm',
        'djv',
        'djvu',
        'ico',
        'ief',
        'jpe',
        'pbm',
        'pgm',
        'pnm',
        'ppm',
        'ras',
        'rgb',
        'tif',
        'tiff',
        'wbmp',
        'xbm',
        'xpm',
        'xwd'
    ],

    'video_extensions' => [
        'flv',
        'mp4',
        'm3u8',
        'ts',
        '3gp',
        'mov',
        'avi',
        'wmv',
    ],
    'swf_extensions' => [
        'swf'
    ],


    'extensions' => [
        'images' => [
            'jpg',
            'jpeg',
            'gif',
            'png',
            'bmp',
            'svg',
            'svgz',
            'cgm',
            'djv',
            'djvu',
            'ico',
            'ief',
            'jpe',
            'pbm',
            'pgm',
            'pnm',
            'ppm',
            'ras',
            'rgb',
            'tif',
            'tiff',
            'wbmp',
            'xbm',
            'xpm',
            'xwd'
        ],
        'videos' => [
            'flv',
            'mp4',
            'm3u8',
            'ts',
            '3gp',
            'mov',
            'avi',
            'wmv',
        ],
        'flashes' => [
            'swf'
        ],
    ],

];
