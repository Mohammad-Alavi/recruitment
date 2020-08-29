<?php

namespace App\Containers\User\UI\API\Transformers;

use App\Containers\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\User\Models\User;
use App\Ship\Parents\Transformers\Transformer;
use League\Fractal\Resource\Collection;

/**
 * Class UserTransformer.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UserTransformer extends Transformer
{
    protected $availableIncludes = [
        'roles',
    ];

    protected $defaultIncludes = [

    ];

    public function transform(User $user): array
    {
        $response = [
            'object' => 'User',
            'id' => $user->getHashedKey(),
            'country_id' => $user->country_id,
            'national_code' => $user->national_code,
            'foreign_national_code' => $user->foreign_national_code,
            'name' => $user->name,
            'email' => $user->email,
            'confirmed' => $user->confirmed,
            'nickname' => $user->nickname,
            'gender' => $user->gender,
            'birth' => $user->birth,

            'social_auth_provider' => $user->social_provider,
            'social_id' => $user->social_id,
            'social_avatar' => [
                'avatar' => $user->social_avatar,
                'original' => $user->social_avatar_original,
            ],

            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'readable_created_at' => $user->created_at === null ? '' : $user->created_at->diffForHumans(),
            'readable_updated_at' => $user->updated_at === null ? '' : $user->updated_at->diffForHumans(),
        ];

        $response = $this->ifAdmin([
            'real_id' => $user->id,
            'deleted_at' => $user->deleted_at,
        ], $response);

        return $response;
    }

    public function includeRoles(User $user): Collection
    {
        return $this->collection($user->roles, new RoleTransformer());
    }

}
