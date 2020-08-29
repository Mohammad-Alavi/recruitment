<?php

namespace App\Containers\Country\UI\API\Requests;

use App\Containers\Country\Data\Transporters\GetAllCountriesTransporter;
use App\Ship\Parents\Requests\Request;

/**
 * Class GetAllCountriesRequest.
 */
class GetAllCountriesRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = GetAllCountriesTransporter::class;

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

    /**
     * @return  array
     */
    public function rules(): array
    {
        return [
            // 'id' => 'required',
            // '{user-input}' => 'required|max:255',
        ];
    }

    /**
     * @return  bool
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}