<?php

namespace App\Containers\WorkExperience\Tasks;

use App\Containers\WorkExperience\Data\Repositories\WorkExperienceRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Request;

class UpdateWorkExperienceTask extends Task
{

    protected $repository;

    public function __construct(WorkExperienceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            $consent_photo = null;
            if (array_key_exists('consent_photo', $data)) {
                $consent_photo = $data['consent_photo'];
                unset($data['consent_photo']);
            }
            $workExperience = $this->repository->update($data, $id);
            if ($consent_photo !== null) {
                $workExperience->addMediaFromRequest('consent_photo')
                    ->usingFileName(md5((Request::file('consent_photo')->getClientOriginalName() . Carbon::now()->toTimeString())) . '.' . Request::file('consent_photo')->getClientOriginalExtension())
                    ->toMediaCollection('work-xp');
            }        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }

        return $workExperience;
    }
}
