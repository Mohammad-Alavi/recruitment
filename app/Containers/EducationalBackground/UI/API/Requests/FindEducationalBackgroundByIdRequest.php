<?php

namespace App\Containers\EducationalBackground\UI\API\Requests;

use App\Containers\EducationalBackground\Data\Transporters\FindEducationalBackgroundByIdTransporter;
use App\Ship\Parents\Requests\Request;

/**
 * Class FindEducationalBackgroundByIdRequest.
 */
class FindEducationalBackgroundByIdRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = FindEducationalBackgroundByIdTransporter::class;

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

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'educational_background_id' => 'required|exists:educational_backgrounds,id',
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
