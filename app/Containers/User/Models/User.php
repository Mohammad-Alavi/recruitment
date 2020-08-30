<?php

namespace App\Containers\User\Models;

use App\Containers\Authorization\Traits\AuthenticationTrait;
use App\Containers\Authorization\Traits\AuthorizationTrait;
use App\Containers\Country\Models\Country;
use App\Containers\DesiredJob\Models\DesiredJob;
use App\Containers\Payment\Contracts\ChargeableInterface;
use App\Containers\Payment\Models\PaymentAccount;
use App\Containers\Payment\Traits\ChargeableTrait;
use App\Containers\Skill\Models\Skill;
use App\Ship\Parents\Models\UserModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

/**
 * Class User.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class User extends UserModel implements ChargeableInterface
{

    use ChargeableTrait;
    use AuthorizationTrait;
    use AuthenticationTrait;
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'device',
        'country_id',
        'national_code',
        'foreign_national_code',
        'platform',
        'gender',
        'birth',
        'marital_status',
        'military_service_status',
        'last_educational_certificate',
        'field_of_study',
        'method_of_introduction',
        'social_provider',
        'social_token',
        'social_refresh_token',
        'social_expires_in',
        'social_token_secret',
        'social_id',
        'social_avatar',
        'social_avatar_original',
        'social_nickname',
        'confirmed',
        'is_client',
    ];

    protected $casts = [
        'is_client' => 'boolean',
        'confirmed' => 'boolean',
        'country_id' => 'integer',
    ];

    /**
     * The dates attributes.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function paymentAccounts(): HasMany
    {
        return $this->hasMany(PaymentAccount::class);
    }


    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function desiredJobs(): HasMany
    {
        return $this->hasMany(DesiredJob::class);
    }
}
