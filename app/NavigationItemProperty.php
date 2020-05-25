<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\NavigationItemProperty
 *
 * @property int $id
 * @property string $title
 * @property string $default_value
 * @property string $input_type
 * @property int $level
 * @property int $navigation
 * @property int|null $is_setting
 * @property string|null $link_type
 * @property int $should_be_validated
 * @property string $validation_rules
 * @property int $is_key
 * @property int $is_fillable
 * @property string|null $fillation_rules
 * @property int|null $have_child
 * @property int|null $can_be_filled
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereCanBeFilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereDefaultValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereFillationRules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereHaveChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereIsFillable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereIsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereIsSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereLinkType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereNavigation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereShouldBeValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereValidationRules($value)
 * @mixin \Eloquent
 */
class NavigationItemProperty extends Model
{
    //
}
