<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Navigation
 *
 * @property int $id
 * @property string $title
 * @property int|null $can_have_item
 * @property int|null $can_have_child
 * @property int|null $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation whereCanHaveChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation whereCanHaveItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Navigation extends Model
{
    //
}
