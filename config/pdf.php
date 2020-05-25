<?php
return [
    'format' => 'A4', // See https://mpdf.github.io/paging/page-size-orientation.html
    'author' => 'John Doe',
    'subject' => 'This Document will explain the whole universe.',
    'keywords' => 'PDF, Laravel, Package, Peace', // Separate values with comma
    'creator' => 'Laravel Pdf',
    'display_mode' => 'fullpage',
    'font_path' => base_path('resources/fonts/'),
    'font_data' => [
        'iransans' => [
            'R' => 'iransans.ttf',    // regular font
            'B' => 'iransans.ttf',       // optional: bold font
            'I' => 'iransans.ttf',     // optional: italic font
            'BI' => 'iransans.ttf', // optional: bold-italic font
            'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
        ]
        // ...add as many as you want.
    ]
];