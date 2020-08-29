<?php

namespace App\Containers\User\UI\API\Requests;

use App\Containers\User\Data\Transporters\UpdateUserTransporter;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Config;

/**
 * Class UpdateUserRequest.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UpdateUserRequest extends Request
{
    protected $transporter = UpdateUserTransporter::class;

    protected $access = [
        'permissions' => 'update-users',
        'roles' => '',
    ];

    protected $decode = [
        'id',
    ];

    protected $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        $allowedGenders = implode(',', Config::get('user-container.valid_inputs.gender'));
        $allowedMilitaryServicesStatus = implode(',', Config::get('user-container.valid_inputs.military_service_status'));
        $allowedMartialStatus = implode(',', Config::get('user-container.valid_inputs.marital_status'));
        $allowedEducationalCertificates = implode(',', Config::get('user-container.valid_inputs.last_educational_certificate'));
        $allowedMethodOfIntroductions = implode(',', Config::get('user-container.valid_inputs.method_of_introduction'));

        return [
            'id' => 'required|exists:users,id',
            'password' => 'min:6|max:40',
            'name' => 'min:2|max:50',
            'last_name' => 'min:2|max:50',
            'birth' => 'date_format:Ymd',
            'gender' => 'in:' . $allowedGenders,
            'military_service_status' => 'in:' . $allowedMilitaryServicesStatus,
            'marital_status' => 'in:' . $allowedMartialStatus,
            'last_educational_certificate' => 'in:' . $allowedEducationalCertificates,
            'field_of_study' => 'min:2|max:150',
            'method_of_introduction' => 'in:' . $allowedMethodOfIntroductions,
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess|isOwner',
        ]);
    }
}
