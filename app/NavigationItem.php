<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\NavigationItem
 *
 * @property int $id
 * @property int $navigation
 * @property string $link_type
 * @property string|null $display_rules
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem whereDisplayRules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem whereLinkType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem whereNavigation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NavigationItem extends Model
{
    //
}
