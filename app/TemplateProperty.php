<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TemplateProperty
 *
 * @property int $id
 * @property string $title
 * @property string $default_value
 * @property string $input_type
 * @property int $level
 * @property int $template
 * @property int|null $is_setting
 * @property string|null $keys
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereCanBeFilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereDefaultValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereFillationRules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereHaveChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereIsFillable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereIsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereIsSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereKeys($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereShouldBeValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereValidationRules($value)
 * @mixin \Eloquent
 */
class TemplateProperty extends Model
{
    //
}
