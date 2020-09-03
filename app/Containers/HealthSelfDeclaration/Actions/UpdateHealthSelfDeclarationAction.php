<?php

namespace App\Containers\HealthSelfDeclaration\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\HealthSelfDeclaration\Data\Transporters\UpdateHealthSelfDeclarationTransporter;
use App\Ship\Parents\Actions\Action;
use JsonException;

class UpdateHealthSelfDeclarationAction extends Action
{
    public function run(UpdateHealthSelfDeclarationTransporter $request)
    {
        $data = $request->sanitizeInput([
            'blood_type',
            'health_options',
        ]);

        if (array_key_exists('health_options', $data)) {
            try {
                $data['health_options'] = json_encode($request->health_options, JSON_THROW_ON_ERROR);
            } catch (JsonException $e) {
            }
        }

        return Apiato::call('HealthSelfDeclaration@UpdateHealthSelfDeclarationTask', [$request->health_self_declaration_id, $data]);
    }
}
