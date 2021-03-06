<?php

namespace App\Containers\EducationalBackground\Models;

use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class EducationalBackground extends Model implements HasMedia
{
    use InteractsWithMedia;

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
    protected $resourceKey = 'educationalbackground';

    /**
     * @param Media|null $media
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width((int)config('user-container.avatar.thumb.width'))
            ->height((int)'user-container.avatar.thumb.height')
            ->keepOriginalImageFormat()
            ->nonQueued()
            ->performOnCollections('edu-bg');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('edu-bg')
            ->singleFile();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
