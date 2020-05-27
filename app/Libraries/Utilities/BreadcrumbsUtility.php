<?php


namespace App\Libraries\Utilities;


use Illuminate\Support\Str;

class BreadcrumbsUtility
{
    public static function createForIndex($type)
    {
        return [
            [
                'title' => trans('messages.navigation_titles.dashboard'),
                'url' => route('admin.index')
            ],
            [
                'title' => PluralUtility::plural(trans("items." . $type)),
                'url' => ''
            ]
        ];

    }

    public static function createForCreate($type)
    {
        return [
            [
                'title' => trans('messages.navigation_titles.dashboard'),
                'url' => route('admin.index')
            ],
            [
                'title' => PluralUtility::plural(trans("items." . $type)),
                'url' => route('items.index', ['type' => $type])
            ],
            [
                'title' => trans('messages.create new item'),
                'url' => ''
            ]
        ];
    }

    public static function createForEdit($type)
    {
        return [
            [
                'title' => trans('messages.navigation_titles.dashboard'),
                'url' => route('admin.index')
            ],
            [
                'title' => PluralUtility::plural(trans("items." . $type)),
                'url' => route('items.index', ['type' => $type])
            ],
            [
                'title' => trans('messages.edit existing item'),
                'url' => ''
            ]
        ];
    }
}