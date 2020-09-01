<?php

namespace App\Containers\Location\Models;

use App\Ship\Parents\Models\Model;

/**
 * App\Containers\Location\Models\Location
 *
 * @property int $id
 * @property string $name
 * @property string|null $globalCode
 * @property int|null $lft
 * @property int|null $rgt
 * @property int|null $lvl
 * @property int|null $parent
 * @property int $published
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Location\Models\Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Location\Models\Location whereGlobalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Location\Models\Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Location\Models\Location whereLft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Location\Models\Location whereLvl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Location\Models\Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Location\Models\Location whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Location\Models\Location wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Location\Models\Location whereRgt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Location\Models\Location whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Location extends Model
{
    protected $fillable = [
        'name',
        'globalCode',
        'lft',
        'rgt',
        'lvl',
        'parent',
        'published'
    ];

    protected $attributes = [

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'locations';
}
