<?php

namespace App\Containers\DesiredJob\UI\API\Requests;

use App\Containers\DesiredJob\Data\Transporters\DeleteDesiredJobTransporter;
use App\Ship\Parents\Requests\Request;

/**
 * Class DeleteDesiredJobRequest.
 */
class DeleteDesiredJobRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = DeleteDesiredJobTransporter::class;

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
        'desired_job_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        'user_id',
        'desired_job_id',
    ];

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'desired_job_id' => 'required|exists:desired_jobs,id',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
