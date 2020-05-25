<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Procedure
 *
 * @property int $id
 * @property int $service_type
 * @property int $next_on_success
 * @property int $next_on_fail
 * @property string $route
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereNextOnFail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereNextOnSuccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereServiceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Procedure extends Model
{
    //
}
