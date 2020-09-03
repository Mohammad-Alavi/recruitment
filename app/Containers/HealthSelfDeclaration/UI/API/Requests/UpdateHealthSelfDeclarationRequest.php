<?php

namespace App\Containers\HealthSelfDeclaration\UI\API\Requests;

use App\Containers\HealthSelfDeclaration\Data\Transporters\UpdateHealthSelfDeclarationTransporter;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Config;

/**
 * Class UpdateHealthSelfDeclarationRequest.
 */
class UpdateHealthSelfDeclarationRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = UpdateHealthSelfDeclarationTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
        'health_self_declaration_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        'health_self_declaration_id',
    ];

    public function rules(): array
    {
        $availableBloodTypes = implode(',', Config::get('health-self-declaration-container.available_blood_types'));

        return [
            'health_self_declaration_id' => 'required|exists:health_self_declarations,id',
            'blood_type' => 'in:' . $availableBloodTypes,
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
