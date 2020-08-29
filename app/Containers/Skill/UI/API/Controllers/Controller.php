<?php

namespace App\Containers\Skill\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Skill\Data\Transporters\CreateSkillTransporter;
use App\Containers\Skill\Data\Transporters\DeleteSkillTransporter;
use App\Containers\Skill\Data\Transporters\FindSkillByIdTransporter;
use App\Containers\Skill\Data\Transporters\GetAllSkillsTransporter;
use App\Containers\Skill\Data\Transporters\UpdateSkillTransporter;
use App\Containers\Skill\UI\API\Requests\CreateSkillRequest;
use App\Containers\Skill\UI\API\Requests\DeleteSkillRequest;
use App\Containers\Skill\UI\API\Requests\FindSkillByIdRequest;
use App\Containers\Skill\UI\API\Requests\GetAllSkillsRequest;
use App\Containers\Skill\UI\API\Requests\UpdateSkillRequest;
use App\Containers\Skill\UI\API\Transformers\SkillTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createSkill(CreateSkillRequest $request): JsonResponse
    {
        $skill = Apiato::call('Skill@CreateSkillAction', [new CreateSkillTransporter($request)]);
        return $this->created($this->transform($skill, SkillTransformer::class));
    }

    public function findSkillById(FindSkillByIdRequest $request): array
    {
        $skill = Apiato::call('Skill@FindSkillByIdAction', [new FindSkillByIdTransporter($request)]);
        return $this->transform($skill, SkillTransformer::class);
    }

    public function getAllSkills(GetAllSkillsRequest $request): array
    {
        $skills = Apiato::call('Skill@GetAllSkillsAction', [new GetAllSkillsTransporter($request)]);
        return $this->transform($skills, SkillTransformer::class);
    }

    public function updateSkill(UpdateSkillRequest $request): array
    {
        $skill = Apiato::call('Skill@UpdateSkillAction', [new UpdateSkillTransporter($request)]);
        return $this->transform($skill, SkillTransformer::class);
    }

    public function deleteSkill(DeleteSkillRequest $request): JsonResponse
    {
        Apiato::call('Skill@DeleteSkillAction', [new DeleteSkillTransporter($request)]);
        return $this->noContent();
    }
}
