<?php

namespace App\Containers\WorkExperience\UI\API\Transformers;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\WorkExperience\Models\WorkExperience;
use App\Ship\Parents\Transformers\Transformer;
use League\Fractal\Resource\Item;
use Vinkla\Hashids\Facades\Hashids;

class WorkExperienceTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'user'
    ];

    public function transform(WorkExperience $entity): array
    {
        $response = [
            'object' => 'WorkExperience',
            'id' => $entity->getHashedKey(),
            'user_id' => Hashids::encode($entity->user_id),
            'work_place_name' => $entity->work_place_name,
            'type_of_work' => $entity->type_of_work,
            'work_duration_year' => $entity->work_duration_year,
            'work_duration_month' => $entity->work_duration_month,
            'insurance_duration_year' => $entity->insurance_duration_year,
            'insurance_duration_month' => $entity->insurance_duration_month,
            'activity_termination_reason' => $entity->activity_termination_reason,
            'employer_name' => $entity->employer_name,
            'employer_number' => $entity->employer_number,
            'consent_text' => $entity->consent_text,
            'images' => [
                'consent_photo' => empty($entity->getFirstMediaUrl('work-xp')) ?
                    null :
                    config('dastranj.storage_path') . str_replace(config('dastranj.storage_path_replace'), '', $entity->getFirstMediaUrl('work-xp')),
                'consent_photo_thumb' => empty($entity->getFirstMediaUrl('work-xp')) ?
                    null :
                    config('dastranj.storage_path') . str_replace(config('dastranj.storage_path_replace'), '', $entity->getFirstMedia('work-xp')->getUrl('thumb')),
            ],
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeUser(WorkExperience $work_experience): Item
    {
        return $this->item($work_experience->user, new UserTransformer());
    }
}
