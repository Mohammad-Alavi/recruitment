<?php

namespace App\Containers\Skill\UI\API\Controllers;

use App\Containers\Skill\UI\API\Requests\CreateSkillRequest;
use App\Containers\Skill\UI\API\Requests\DeleteSkillRequest;
use App\Containers\Skill\UI\API\Requests\GetAllSkillsRequest;
use App\Containers\Skill\UI\API\Requests\FindSkillByIdRequest;
use App\Containers\Skill\UI\API\Requests\UpdateSkillRequest;
use App\Containers\Skill\UI\API\Transformers\SkillTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Skill\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateSkillRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSkill(CreateSkillRequest $request)
    {
        $skill = Apiato::call('Skill@CreateSkillAction', [$request]);

        return $this->created($this->transform($skill, SkillTransformer::class));
    }

    /**
     * @param FindSkillByIdRequest $request
     * @return array
     */
    public function findSkillById(FindSkillByIdRequest $request)
    {
        $skill = Apiato::call('Skill@FindSkillByIdAction', [$request]);

        return $this->transform($skill, SkillTransformer::class);
    }

    /**
     * @param GetAllSkillsRequest $request
     * @return array
     */
    public function getAllSkills(GetAllSkillsRequest $request)
    {
        $skills = Apiato::call('Skill@GetAllSkillsAction', [$request]);

        return $this->transform($skills, SkillTransformer::class);
    }

    /**
     * @param UpdateSkillRequest $request
     * @return array
     */
    public function updateSkill(UpdateSkillRequest $request)
    {
        $skill = Apiato::call('Skill@UpdateSkillAction', [$request]);

        return $this->transform($skill, SkillTransformer::class);
    }

    /**
     * @param DeleteSkillRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSkill(DeleteSkillRequest $request)
    {
        Apiato::call('Skill@DeleteSkillAction', [$request]);

        return $this->noContent();
    }
}
