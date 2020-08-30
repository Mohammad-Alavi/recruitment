<?php

namespace App\Containers\DesiredJob\UI\API\Requests;

use App\Containers\DesiredJob\Data\Transporters\GetAllDesiredJobsTransporter;
use App\Ship\Parents\Requests\Request;

/**
 * Class GetAllDesiredJobsRequest.
 */
class GetAllDesiredJobsRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = GetAllDesiredJobsTransporter::class;

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
        return [
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
