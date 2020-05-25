<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\WidgetPart
 *
 * @property int $id
 * @property int|null $widget
 * @property int|null $widget_part_type
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart whereWidget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart whereWidgetPartType($value)
 * @mixin \Eloquent
 */
class WidgetPart extends Model
{
    //
}
