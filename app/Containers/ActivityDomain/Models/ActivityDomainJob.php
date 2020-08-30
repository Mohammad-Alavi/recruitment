<?php

namespace App\Containers\ActivityDomain\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityDomainJob extends Model
{
    protected $table = 'activity_domain_jobs';

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
    protected $resourceKey = 'activitydomainjobs';

    public function activityDomain(): BelongsTo
    {
        return $this->belongsTo(ActivityDomain::class);
    }
}
