<?php

namespace App\Containers\DesiredJob\UI\API\Requests;

use App\Containers\DesiredJob\Data\Transporters\CreateDesiredJobTransporter;
use App\Ship\Parents\Requests\Request;

/**
 * Class CreateDesiredJobRequest.
 */
class CreateDesiredJobRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = CreateDesiredJobTransporter::class;

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
            'activity_domain_id' => 'required|exists:activity_domains,id',
            'activity_domain_job_id' => 'required|exists:activity_domain_jobs,id',
            'ready_date' => 'required|date_format:Ymd',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
