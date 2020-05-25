<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserType
 *
 * @property int $id
 * @property string $title
 * @property int|null $can_have_item
 * @property int|null $can_have_child
 * @property string $locales
 * @property string|null $actions
 * @property string $triggers
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereActions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereCanHaveChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereCanHaveItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereLocales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereTriggers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserType extends Model
{
    //
}
