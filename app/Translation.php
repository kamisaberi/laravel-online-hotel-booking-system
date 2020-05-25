<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Translation
 *
 * @property int $id
 * @property string|null $locale
 * @property string|null $table
 * @property string|null $field
 * @property int|null $record
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereRecord($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereTable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereValue($value)
 * @mixin \Eloquent
 */
class Translation extends Model
{
    //
}
