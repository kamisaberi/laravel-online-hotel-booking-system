<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserProperty
 *
 * @property int $id
 * @property string $title
 * @property string $values
 * @property string $default_value
 * @property string $input_type
 * @property string|null $actions
 * @property string $locales
 * @property string $filters
 * @property int $level
 * @property int $type
 * @property int $is_setting
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereActions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereCanBeFilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereDefaultValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereFillationRules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereFilters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereHaveChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereIsFillable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereIsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereIsSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereLocales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereShouldBeValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereValidationRules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereValues($value)
 * @mixin \Eloquent
 */
class UserProperty extends Model
{
    //
}
