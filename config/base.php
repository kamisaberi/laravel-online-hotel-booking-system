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


    'routes' => [
        'data' => [

            'items' => [
                'data.index',
                'data.show',
                'data.create',
                'data.store',
                'data.edit',
                'data.update',
                'data.destroy',
                'data.change',
            ],
            'types' => [
                'data.types.index',
                'data.types.show',
                'data.types.create',
                'data.types.store',
                'data.types.edit',
                'data.types.update',
                'data.types.destroy',
                'data.types.change',
            ],
            'properties' => [
                'data.properties.index',
                'data.properties.show',
                'data.properties.create',
                'data.properties.store',
                'data.properties.edit',
                'data.properties.update',
                'data.properties.destroy',
                'data.properties.change',
            ],
            'settings' => [
                'data.settings.index',
                'data.settings.show',
                'data.settings.create',
                'data.settings.store',
                'data.settings.edit',
                'data.settings.update',
                'data.settings.destroy',
                'data.settings.change',
            ],

        ],
        'documents' => [

            'items' => [
                'documents.index',
                'documents.show',
                'documents.create',
                'documents.store',
                'documents.edit',
                'documents.update',
                'documents.destroy',
                'documents.change',
            ],
            'types' => [
                'documents.types.index',
                'documents.types.show',
                'documents.types.create',
                'documents.types.store',
                'documents.types.edit',
                'documents.types.update',
                'documents.types.destroy',
                'documents.types.change',
            ],
            'properties' => [
                'documents.properties.index',
                'documents.properties.show',
                'documents.properties.create',
                'documents.properties.store',
                'documents.properties.edit',
                'documents.properties.update',
                'documents.properties.destroy',
                'documents.properties.change',
            ],
            'settings' => [
                'documents.settings.index',
                'documents.settings.show',
                'documents.settings.create',
                'documents.settings.store',
                'documents.settings.edit',
                'documents.settings.update',
                'documents.settings.destroy',
                'documents.settings.change',
            ],


        ],
        'services' => [


            'items' => [
                'services.index',
                'services.show',
                'services.create',
                'services.store',
                'services.edit',
                'services.update',
                'services.destroy',
                'services.change',
            ],
            'types' => [
                'services.types.index',
                'services.types.show',
                'services.types.create',
                'services.types.store',
                'services.types.edit',
                'services.types.update',
                'services.types.destroy',
                'services.types.change',
            ],
            'properties' => [
                'services.properties.index',
                'services.properties.show',
                'services.properties.create',
                'services.properties.store',
                'services.properties.edit',
                'services.properties.update',
                'services.properties.destroy',
                'services.properties.change',
            ],
            'settings' => [
                'services.settings.index',
                'services.settings.show',
                'services.settings.create',
                'services.settings.store',
                'services.settings.edit',
                'services.settings.update',
                'services.settings.destroy',
                'services.settings.change',
            ],


        ],
        'users' => [


            'items' => [
                'users.index',
                'users.show',
                'users.create',
                'users.store',
                'users.edit',
                'users.update',
                'users.destroy',
                'users.change',
            ],
            'types' => [
                'users.types.index',
                'users.types.show',
                'users.types.create',
                'users.types.store',
                'users.types.edit',
                'users.types.update',
                'users.types.destroy',
                'users.types.change',
            ],
            'properties' => [
                'users.properties.index',
                'users.properties.show',
                'users.properties.create',
                'users.properties.store',
                'users.properties.edit',
                'users.properties.update',
                'users.properties.destroy',
                'users.properties.change',
            ],
            'settings' => [
                'users.settings.index',
                'users.settings.show',
                'users.settings.create',
                'users.settings.store',
                'users.settings.edit',
                'users.settings.update',
                'users.settings.destroy',
                'users.settings.change',
            ],


        ],
        'conversations' => [

            'items' => [
                'conversations.index',
                'conversations.show',
                'conversations.create',
                'conversations.store',
                'conversations.edit',
                'conversations.update',
                'conversations.destroy',
                'conversations.change',
            ],
            'types' => [
                'conversations.types.index',
                'conversations.types.show',
                'conversations.types.create',
                'conversations.types.store',
                'conversations.types.edit',
                'conversations.types.update',
                'conversations.types.destroy',
                'conversations.types.change',
            ],
            'properties' => [
                'conversations.properties.index',
                'conversations.properties.show',
                'conversations.properties.create',
                'conversations.properties.store',
                'conversations.properties.edit',
                'conversations.properties.update',
                'conversations.properties.destroy',
                'conversations.properties.change',
            ],
            'settings' => [
                'conversations.settings.index',
                'conversations.settings.show',
                'conversations.settings.create',
                'conversations.settings.store',
                'conversations.settings.edit',
                'conversations.settings.update',
                'conversations.settings.destroy',
                'conversations.settings.change',
            ],

        ],
        'communications' => [

            'items' => [
                'communications.index',
                'communications.show',
                'communications.create',
                'communications.store',
                'communications.edit',
                'communications.update',
                'communications.destroy',
                'communications.change',
            ],
            'types' => [
                'communications.types.index',
                'communications.types.show',
                'communications.types.create',
                'communications.types.store',
                'communications.types.edit',
                'communications.types.update',
                'communications.types.destroy',
                'communications.types.change',
            ],
            'properties' => [
                'communications.properties.index',
                'communications.properties.show',
                'communications.properties.create',
                'communications.properties.store',
                'communications.properties.edit',
                'communications.properties.update',
                'communications.properties.destroy',
                'communications.properties.change',
            ],
            'settings' => [
                'communications.settings.index',
                'communications.settings.show',
                'communications.settings.create',
                'communications.settings.store',
                'communications.settings.edit',
                'communications.settings.update',
                'communications.settings.destroy',
                'communications.settings.change',
            ],

        ],
        'relations' => [

            'items' => [
                'relations.index',
                'relations.show',
                'relations.create',
                'relations.store',
                'relations.edit',
                'relations.update',
                'relations.destroy',
                'relations.change',
            ],
            'types' => [
                'relations.types.index',
                'relations.types.show',
                'relations.types.create',
                'relations.types.store',
                'relations.types.edit',
                'relations.types.update',
                'relations.types.destroy',
                'relations.types.change',
            ],
            'properties' => [
                'relations.properties.index',
                'relations.properties.show',
                'relations.properties.create',
                'relations.properties.store',
                'relations.properties.edit',
                'relations.properties.update',
                'relations.properties.destroy',
                'relations.properties.change',
            ],
            'settings' => [
                'relations.settings.index',
                'relations.settings.show',
                'relations.settings.create',
                'relations.settings.store',
                'relations.settings.edit',
                'relations.settings.update',
                'relations.settings.destroy',
                'relations.settings.change',
            ],

        ],
        'navigation' => [

            'items' => [
                'navigation.index',
                'navigation.show',
                'navigation.create',
                'navigation.store',
                'navigation.edit',
                'navigation.update',
                'navigation.destroy',
                'navigation.change',
            ],
            'types' => [
                'navigation.types.index',
                'navigation.types.show',
                'navigation.types.create',
                'navigation.types.store',
                'navigation.types.edit',
                'navigation.types.update',
                'navigation.types.destroy',
                'navigation.types.change',
            ],
            'properties' => [
                'navigation.properties.index',
                'navigation.properties.show',
                'navigation.properties.create',
                'navigation.properties.store',
                'navigation.properties.edit',
                'navigation.properties.update',
                'navigation.properties.destroy',
                'navigation.properties.change',
            ],
            'settings' => [
                'navigation.settings.index',
                'navigation.settings.show',
                'navigation.settings.create',
                'navigation.settings.store',
                'navigation.settings.edit',
                'navigation.settings.update',
                'navigation.settings.destroy',
                'navigation.settings.change',
            ],

        ],
        'permissions' => [

            'items' => [
                'permissions.index',
                'permissions.show',
                'permissions.create',
                'permissions.store',
                'permissions.edit',
                'permissions.update',
                'permissions.destroy',
                'permissions.change',
            ],
            'types' => [
                'permissions.types.index',
                'permissions.types.show',
                'permissions.types.create',
                'permissions.types.store',
                'permissions.types.edit',
                'permissions.types.update',
                'permissions.types.destroy',
                'permissions.types.change',
            ],
            'properties' => [
                'permissions.properties.index',
                'permissions.properties.show',
                'permissions.properties.create',
                'permissions.properties.store',
                'permissions.properties.edit',
                'permissions.properties.update',
                'permissions.properties.destroy',
                'permissions.properties.change',
            ],
            'settings' => [
                'permissions.settings.index',
                'permissions.settings.show',
                'permissions.settings.create',
                'permissions.settings.store',
                'permissions.settings.edit',
                'permissions.settings.update',
                'permissions.settings.destroy',
                'permissions.settings.change',
            ],

        ],


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
