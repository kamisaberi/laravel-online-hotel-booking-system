<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Widget
 *
 * @property int $id
 * @property string|null $view
 * @property string|null $route
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget whereView($value)
 * @mixin \Eloquent
 */
class Widget extends Model
{
    //
}
