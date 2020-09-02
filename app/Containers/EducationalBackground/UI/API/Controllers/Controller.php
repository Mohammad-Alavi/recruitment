<?php

namespace App\Containers\EducationalBackground\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\EducationalBackground\Data\Transporters\CreateEducationalBackgroundTransporter;
use App\Containers\EducationalBackground\Data\Transporters\DeleteEducationalBackgroundTransporter;
use App\Containers\EducationalBackground\Data\Transporters\FindEducationalBackgroundByIdTransporter;
use App\Containers\EducationalBackground\Data\Transporters\GetAllEducationalBackgroundsTransporter;
use App\Containers\EducationalBackground\Data\Transporters\UpdateEducationalBackgroundTransporter;
use App\Containers\EducationalBackground\UI\API\Requests\CreateEducationalBackgroundRequest;
use App\Containers\EducationalBackground\UI\API\Requests\DeleteEducationalBackgroundRequest;
use App\Containers\EducationalBackground\UI\API\Requests\FindEducationalBackgroundByIdRequest;
use App\Containers\EducationalBackground\UI\API\Requests\GetAllEducationalBackgroundsRequest;
use App\Containers\EducationalBackground\UI\API\Requests\UpdateEducationalBackgroundRequest;
use App\Containers\EducationalBackground\UI\API\Transformers\EducationalBackgroundTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createEducationalBackground(CreateEducationalBackgroundRequest $request): JsonResponse
    {
        $educationalBackground = Apiato::call('EducationalBackground@CreateEducationalBackgroundAction', [new CreateEducationalBackgroundTransporter($request)]);
        return $this->created($this->transform($educationalBackground, EducationalBackgroundTransformer::class));
    }

    public function findEducationalBackgroundById(FindEducationalBackgroundByIdRequest $request): array
    {
        $educationalBackground = Apiato::call('EducationalBackground@FindEducationalBackgroundByIdAction', [new FindEducationalBackgroundByIdTransporter($request)]);
        return $this->transform($educationalBackground, EducationalBackgroundTransformer::class);
    }

    public function getAllEducationalBackgrounds(GetAllEducationalBackgroundsRequest $request): array
    {
        $educationalBackgrounds = Apiato::call('EducationalBackground@GetAllEducationalBackgroundsAction', [new GetAllEducationalBackgroundsTransporter($request)]);
        return $this->transform($educationalBackgrounds, EducationalBackgroundTransformer::class);
    }

    public function updateEducationalBackground(UpdateEducationalBackgroundRequest $request): array
    {
        $educationalBackground = Apiato::call('EducationalBackground@UpdateEducationalBackgroundAction', [new UpdateEducationalBackgroundTransporter($request)]);
        return $this->transform($educationalBackground, EducationalBackgroundTransformer::class);
    }

    public function deleteEducationalBackground(DeleteEducationalBackgroundRequest $request): JsonResponse
    {
        Apiato::call('EducationalBackground@DeleteEducationalBackgroundAction', [new DeleteEducationalBackgroundTransporter($request)]);
        return $this->noContent();
    }
}
