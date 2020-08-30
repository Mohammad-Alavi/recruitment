<?php

namespace App\Containers\ActivityDomain\UI\API\Requests;

use App\Containers\ActivityDomain\Data\Transporters\GetAllActivityDomainsTransporter;
use App\Ship\Parents\Requests\Request;

/**
 * Class GetAllActivityDomainsRequest.
 */
class GetAllActivityDomainsRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = GetAllActivityDomainsTransporter::class;

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
        // 'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        // 'id',
    ];

    public function rules(): array
    {
        return [
            // 'id' => 'required',
            // '{user-input}' => 'required|max:255',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
