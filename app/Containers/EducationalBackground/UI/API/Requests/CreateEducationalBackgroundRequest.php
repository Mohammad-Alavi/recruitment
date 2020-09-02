<?php

namespace App\Containers\EducationalBackground\UI\API\Requests;

use App\Containers\EducationalBackground\Data\Transporters\CreateEducationalBackgroundTransporter;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Config;

/**
 * Class CreateEducationalBackgroundRequest.
 */
class CreateEducationalBackgroundRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = CreateEducationalBackgroundTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => '',
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
        $availableDegrees = implode(',', Config::get('educational-background-container.available_degrees'));

        return [
            'user_id' => 'required|exists:users,id',
            'field_of_study' => 'required|min:2|max:50',
            'degree' => 'required|in:' . $availableDegrees,
            'graduation_place' => 'required|min:2|max:50',
            'grade_point_average' => 'required|numeric|min:0|max:20',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
