<?php

namespace App\Containers\User\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Data\Transporters\UpdateUserTransporter;
use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\Hash;

/**
 * Class UpdateUserAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UpdateUserAction extends Action
{
    public function run(UpdateUserTransporter $data): User
    {
        $userData = $data->sanitizeInput([
            'password',
            'gender',
            'birth',
            'name',
            'last_name',
            'marital_status',
            'military_service_status',
            'last_educational_certificate',
            'field_of_study',
            'method_of_introduction',
            'device',
            'platform',
            'social_token',
            'social_expires_in',
            'social_refresh_token',
            'social_token_secret',
        ]);

        return Apiato::call('User@UpdateUserTask', [$userData, $data->id]);
    }
}
