<?php
return [

    'room' => [
        'fields' => [

        ],
        'relations' => [
            'image' => ["relation" => "hasOne", "table" => "images"],
            'images' => ["relation" => "hasMany", "table" => "images"],
            'video' => ["relation" => "hasOne", "table" => "videos"],
            'flash' => ["relation" => "hasOne", "table" => "flashes"],
            'price' => ["relation" => "hasMany", "table" => "room_prices"],
            'hotel' => ["relation" => "belongsTo", "table" => "hotels"],
        ]

    ]


];