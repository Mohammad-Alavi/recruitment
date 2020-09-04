<?php

namespace App\Containers\EducationalBackground\UI\API\Requests;

use App\Containers\EducationalBackground\Data\Transporters\UpdateEducationalBackgroundTransporter;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Config;

/**
 * Class UpdateEducationalBackgroundRequest.
 */
class UpdateEducationalBackgroundRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = UpdateEducationalBackgroundTransporter::class;

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
        'educational_background_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        'user_id',
        'educational_background_id',
    ];

    public function rules(): array
    {
        $availableDegrees = implode(',', Config::get('educational-background-container.available_degrees'));

        return [
            'user_id' => 'required|exists:users,id',
            'educational_background_id' => 'required|exists:educational_backgrounds,id',
            'field_of_study' => 'min:2|max:50',
            'degree' => 'in:' . $availableDegrees,
            'graduation_place' => 'min:2|max:50',
            'grade_point_average' => 'numeric|min:0|max:20',
            'photo'    => 'image|max:1024',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
