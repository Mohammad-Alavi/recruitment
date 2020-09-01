<?php

namespace App\Containers\WorkExperience\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\WorkExperience\Data\Transporters\CreateWorkExperienceTransporter;
use App\Containers\WorkExperience\Data\Transporters\DeleteWorkExperienceTransporter;
use App\Containers\WorkExperience\Data\Transporters\FindWorkExperienceByIdTransporter;
use App\Containers\WorkExperience\Data\Transporters\GetAllWorkExperiencesTransporter;
use App\Containers\WorkExperience\Data\Transporters\UpdateWorkExperienceTransporter;
use App\Containers\WorkExperience\UI\API\Requests\CreateWorkExperienceRequest;
use App\Containers\WorkExperience\UI\API\Requests\DeleteWorkExperienceRequest;
use App\Containers\WorkExperience\UI\API\Requests\FindWorkExperienceByIdRequest;
use App\Containers\WorkExperience\UI\API\Requests\GetAllWorkExperiencesRequest;
use App\Containers\WorkExperience\UI\API\Requests\UpdateWorkExperienceRequest;
use App\Containers\WorkExperience\UI\API\Transformers\WorkExperienceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createWorkExperience(CreateWorkExperienceRequest $request): JsonResponse
    {
        $workExperience = Apiato::call('WorkExperience@CreateWorkExperienceAction', [new CreateWorkExperienceTransporter($request)]);
        return $this->created($this->transform($workExperience, WorkExperienceTransformer::class));
    }

    public function findWorkExperienceById(FindWorkExperienceByIdRequest $request): array
    {
        $workExperience = Apiato::call('WorkExperience@FindWorkExperienceByIdAction', [new FindWorkExperienceByIdTransporter($request)]);
        return $this->transform($workExperience, WorkExperienceTransformer::class);
    }

    public function getAllWorkExperiences(GetAllWorkExperiencesRequest $request): array
    {
        $workExperiences = Apiato::call('WorkExperience@GetAllWorkExperiencesAction', [new GetAllWorkExperiencesTransporter($request)]);
        return $this->transform($workExperiences, WorkExperienceTransformer::class);
    }

    public function updateWorkExperience(UpdateWorkExperienceRequest $request): array
    {
        $workExperience = Apiato::call('WorkExperience@UpdateWorkExperienceAction', [new UpdateWorkExperienceTransporter($request)]);
        return $this->transform($workExperience, WorkExperienceTransformer::class);
    }

    public function deleteWorkExperience(DeleteWorkExperienceRequest $request): JsonResponse
    {
        Apiato::call('WorkExperience@DeleteWorkExperienceAction', [new DeleteWorkExperienceTransporter($request)]);
        return $this->noContent();
    }
}
