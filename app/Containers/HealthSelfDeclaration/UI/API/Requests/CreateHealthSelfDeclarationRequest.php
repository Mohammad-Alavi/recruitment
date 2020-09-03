<?php

namespace App\Containers\HealthSelfDeclaration\UI\API\Requests;

use App\Containers\HealthSelfDeclaration\Data\Transporters\CreateHealthSelfDeclarationTransporter;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Config;

/**
 * Class CreateHealthSelfDeclarationRequest.
 */
class CreateHealthSelfDeclarationRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = CreateHealthSelfDeclarationTransporter::class;

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
        'user_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        'user_id',
    ];

    public function rules(): array
    {
        $availableBloodTypes = implode(',', Config::get('health-self-declaration-container.available_blood_types'));

        return [
            'user_id' => 'required|exists:users,id',
            'blood_type' => 'required|in:' . $availableBloodTypes,
            'health_options' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
