<?php

namespace App\Containers\WorkExperience\UI\API\Requests;

use App\Containers\WorkExperience\Data\Transporters\CreateWorkExperienceTransporter;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Config;

/**
 * Class CreateWorkExperienceRequest.
 */
class CreateWorkExperienceRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = CreateWorkExperienceTransporter::class;

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
        $availableTerminationReasons = implode(',', Config::get('work-experience-container.available_activity_termination_reason'));

        return [
            'user_id' => 'required|exists:users,id',
            'work_place_name' => 'required|min:2|max:50',
            'type_of_work' => 'required|min:2|max:50',
            'work_duration_year' => 'required|integer|min:0|max:40',
            'work_duration_month' => 'required|integer|min:0|max:12',
            'insurance_duration_year' => 'required|integer|min:0|max:40',
            'insurance_duration_month' => 'required|integer|min:0|max:12',
            'activity_termination_reason' => 'required|in:' . $availableTerminationReasons,
            'employer_name' => 'min:2|max:50',
            'employer_number' => 'string',
            'consent_text' => 'min:2|max:300',
            'consent_photo' => 'image|max:1024',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
