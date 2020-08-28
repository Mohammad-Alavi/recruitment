<?php

namespace App\Containers\Country\Models;

use App\Ship\Parents\Models\Model;

class Country extends Model
{
    protected $guarded = [];

    protected $attributes = [];

    protected $hidden = [];

    protected $casts = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'countries';
}
