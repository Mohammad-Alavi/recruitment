<?php

namespace App\Containers\DesiredJob\Models;

use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DesiredJob extends Model
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
    protected $resourceKey = 'desiredjobs';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
