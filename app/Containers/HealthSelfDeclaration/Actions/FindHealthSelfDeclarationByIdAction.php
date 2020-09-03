<?php

namespace App\Containers\HealthSelfDeclaration\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\HealthSelfDeclaration\Data\Transporters\FindHealthSelfDeclarationByIdTransporter;
use App\Ship\Parents\Actions\Action;

class FindHealthSelfDeclarationByIdAction extends Action
{
    public function run(FindHealthSelfDeclarationByIdTransporter $request)
    {
        return Apiato::call('HealthSelfDeclaration@FindHealthSelfDeclarationByIdTask', [$request->health_self_declaration_id]);
    }
}
