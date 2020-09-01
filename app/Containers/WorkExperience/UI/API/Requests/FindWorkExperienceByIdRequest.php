<?php

namespace App\Containers\WorkExperience\UI\API\Requests;

use App\Containers\WorkExperience\Data\Transporters\FindWorkExperienceByIdTransporter;
use App\Ship\Parents\Requests\Request;

/**
 * Class FindWorkExperienceByIdRequest.
 */
class FindWorkExperienceByIdRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = FindWorkExperienceByIdTransporter::class;

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
        'work_experience_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        'user_id',
        'work_experience_id',
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'work_experience_id' => 'required|exists:work_experiences,id',
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
