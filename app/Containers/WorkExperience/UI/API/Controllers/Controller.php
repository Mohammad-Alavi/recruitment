<?php

namespace App\Containers\WorkExperience\UI\API\Controllers;

use App\Containers\WorkExperience\UI\API\Requests\CreateWorkExperienceRequest;
use App\Containers\WorkExperience\UI\API\Requests\DeleteWorkExperienceRequest;
use App\Containers\WorkExperience\UI\API\Requests\GetAllWorkExperiencesRequest;
use App\Containers\WorkExperience\UI\API\Requests\FindWorkExperienceByIdRequest;
use App\Containers\WorkExperience\UI\API\Requests\UpdateWorkExperienceRequest;
use App\Containers\WorkExperience\UI\API\Transformers\WorkExperienceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\WorkExperience\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateWorkExperienceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createWorkExperience(CreateWorkExperienceRequest $request)
    {
        $workexperience = Apiato::call('WorkExperience@CreateWorkExperienceAction', [$request]);

        return $this->created($this->transform($workexperience, WorkExperienceTransformer::class));
    }

    /**
     * @param FindWorkExperienceByIdRequest $request
     * @return array
     */
    public function findWorkExperienceById(FindWorkExperienceByIdRequest $request)
    {
        $workexperience = Apiato::call('WorkExperience@FindWorkExperienceByIdAction', [$request]);

        return $this->transform($workexperience, WorkExperienceTransformer::class);
    }

    /**
     * @param GetAllWorkExperiencesRequest $request
     * @return array
     */
    public function getAllWorkExperiences(GetAllWorkExperiencesRequest $request)
    {
        $workexperiences = Apiato::call('WorkExperience@GetAllWorkExperiencesAction', [$request]);

        return $this->transform($workexperiences, WorkExperienceTransformer::class);
    }

    /**
     * @param UpdateWorkExperienceRequest $request
     * @return array
     */
    public function updateWorkExperience(UpdateWorkExperienceRequest $request)
    {
        $workexperience = Apiato::call('WorkExperience@UpdateWorkExperienceAction', [$request]);

        return $this->transform($workexperience, WorkExperienceTransformer::class);
    }

    /**
     * @param DeleteWorkExperienceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteWorkExperience(DeleteWorkExperienceRequest $request)
    {
        Apiato::call('WorkExperience@DeleteWorkExperienceAction', [$request]);

        return $this->noContent();
    }
}
