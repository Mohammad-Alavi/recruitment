<?php

namespace App\Containers\ActivityDomain\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ActivityDomain extends Model
{
    protected $guarded = [];

    protected $attributes = [

    ];

    protected $hidden = [

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
    protected $resourceKey = 'activitydomains';

    public function jobs(): HasMany
    {
        return $this->hasMany(ActivityDomainJob::class);
    }
}
