<?php

namespace App\Containers\User\UI\API\Transformers;

use App\Containers\Address\UI\API\Transformers\AddressTransformer;
use App\Containers\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\DesiredJob\UI\API\Transformers\DesiredJobTransformer;
use App\Containers\EducationalBackground\UI\API\Transformers\EducationalBackgroundTransformer;
use App\Containers\HealthSelfDeclaration\UI\API\Transformers\HealthSelfDeclarationTransformer;
use App\Containers\Skill\UI\API\Transformers\SkillTransformer;
use App\Containers\User\Models\User;
use App\Containers\WorkExperience\UI\API\Transformers\WorkExperienceTransformer;
use App\Ship\Parents\Transformers\Transformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

/**
 * Class UserTransformer.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UserTransformer extends Transformer
{
    protected $availableIncludes = [
        'roles',
        'DesiredJobs',
        'WorkExperiences',
        'EducationalBackgrounds',
        'Skills',
        'Address',
        'HealthSelfDeclaration',
    ];

    protected $defaultIncludes = [
        'DesiredJobs',
        'WorkExperiences',
        'EducationalBackgrounds',
        'Skills',
        'Address',
        'HealthSelfDeclaration',
    ];

    public function transform(User $user): array
    {
        $response = [
            'object' => 'User',
            'id' => $user->getHashedKey(),
            'name' => $user->name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'marital_status' => $user->marital_status,
            'military_service_status' => $user->military_service_status,
            'last_educational_certificate' => $user->last_educational_certificate,
            'field_of_study' => $user->field_of_study,
            'method_of_introduction' => $user->method_of_introduction,
            'country_id' => $user->country_id,
            'national_code' => $user->national_code,
            'foreign_national_code' => $user->foreign_national_code,
            'confirmed' => $user->confirmed,
            'gender' => $user->gender,
            'birth' => $user->birth,
            'images' => [
                'avatar' => empty($user->getFirstMediaUrl('avatar')) ?
                    config('dastranj.storage_path') . config('dastranj.default.avatar') :
                    config('dastranj.storage_path') . str_replace(config('dastranj.storage_path_replace'), '', $user->getFirstMediaUrl('avatar')),
                'avatar_thumb' => empty($user->getFirstMediaUrl('avatar')) ?
                    config('dastranj.storage_path') . config('dastranj.default.avatar_thumb') :
                    config('dastranj.storage_path') . str_replace(config('dastranj.storage_path_replace'), '', $user->getFirstMedia('avatar')->getUrl('thumb')),
            ],
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

    public function includeDesiredJobs(User $user): Collection
    {
        return $this->collection($user->desiredJobs, new DesiredJobTransformer());
    }

    public function includeWorkExperiences(User $user): Collection
    {
        return $this->collection($user->workExperience, new WorkExperienceTransformer());
    }

    public function includeEducationalBackgrounds(User $user): Collection
    {
        return $this->collection($user->educationalBackground, new EducationalBackgroundTransformer());
    }

    public function includeSkills(User $user): Collection
    {
        return $this->collection($user->skills, new SkillTransformer());
    }

    public function includeAddress(User $user): ?Item
    {
        return $this->item($user->address, new AddressTransformer());
    }

    public function includeHealthSelfDeclaration(User $user): ?Item
    {
        return $this->item($user->healthSelfDeclaration, new HealthSelfDeclarationTransformer());
    }
}
