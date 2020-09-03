<?php

namespace App\Containers\HealthSelfDeclaration\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\HealthSelfDeclaration\Data\Transporters\CreateHealthSelfDeclarationTransporter;
use App\Ship\Parents\Actions\Action;

class CreateHealthSelfDeclarationAction extends Action
{
    public function run(CreateHealthSelfDeclarationTransporter $request)
    {
        $data = $request->sanitizeInput([
            'user_id',
            'blood_type',
            'health_options',
        ]);

        if (array_key_exists('health_options', $data)) {
            try {
                $data['health_options'] = json_encode($request->health_options, JSON_THROW_ON_ERROR);
            } catch (JsonException $e) {
            }
        }

        return Apiato::call('HealthSelfDeclaration@CreateHealthSelfDeclarationTask', [$request->user_id, $data]);
    }
}
