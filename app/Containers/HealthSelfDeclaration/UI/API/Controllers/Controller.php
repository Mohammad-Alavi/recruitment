<?php

namespace App\Containers\HealthSelfDeclaration\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\HealthSelfDeclaration\Data\Transporters\CreateHealthSelfDeclarationTransporter;
use App\Containers\HealthSelfDeclaration\Data\Transporters\FindHealthSelfDeclarationByIdTransporter;
use App\Containers\HealthSelfDeclaration\Data\Transporters\UpdateHealthSelfDeclarationTransporter;
use App\Containers\HealthSelfDeclaration\UI\API\Requests\CreateHealthSelfDeclarationRequest;
use App\Containers\HealthSelfDeclaration\UI\API\Requests\DeleteHealthSelfDeclarationRequest;
use App\Containers\HealthSelfDeclaration\UI\API\Requests\FindHealthSelfDeclarationByIdRequest;
use App\Containers\HealthSelfDeclaration\UI\API\Requests\GetAllHealthSelfDeclarationsRequest;
use App\Containers\HealthSelfDeclaration\UI\API\Requests\UpdateHealthSelfDeclarationRequest;
use App\Containers\HealthSelfDeclaration\UI\API\Transformers\HealthSelfDeclarationTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createHealthSelfDeclaration(CreateHealthSelfDeclarationRequest $request): JsonResponse
    {
        $healthSelfDeclaration = Apiato::call('HealthSelfDeclaration@CreateHealthSelfDeclarationAction', [new CreateHealthSelfDeclarationTransporter($request)]);
        return $this->created($this->transform($healthSelfDeclaration, HealthSelfDeclarationTransformer::class));
    }

    public function findHealthSelfDeclarationById(FindHealthSelfDeclarationByIdRequest $request): array
    {
        $healthSelfDeclaration = Apiato::call('HealthSelfDeclaration@FindHealthSelfDeclarationByIdAction', [new FindHealthSelfDeclarationByIdTransporter($request)]);
        return $this->transform($healthSelfDeclaration, HealthSelfDeclarationTransformer::class);
    }

    public function updateHealthSelfDeclaration(UpdateHealthSelfDeclarationRequest $request): array
    {
        $healthSelfDeclaration = Apiato::call('HealthSelfDeclaration@UpdateHealthSelfDeclarationAction', [new UpdateHealthSelfDeclarationTransporter($request)]);
        return $this->transform($healthSelfDeclaration, HealthSelfDeclarationTransformer::class);
    }
}
