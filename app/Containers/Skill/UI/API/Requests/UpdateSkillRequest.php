<?php

namespace App\Containers\Skill\UI\API\Requests;

use App\Containers\Skill\Data\Transporters\UpdateSkillTransporter;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Config;

/**
 * Class UpdateSkillRequest.
 */
class UpdateSkillRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = UpdateSkillTransporter::class;

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
        'skill_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        'user_id',
        'skill_id',
    ];

    public function rules(): array
    {
        $availableSkillLevels = implode(',', Config::get('skill-container.skill_levels'));

        return [
            'user_id' => 'required|exists:users,id',
            'skill_id' => 'required|exists:skills,id',
            'name' => 'min:4|max:50',
            'skill_level' => 'in:' . $availableSkillLevels,
            'from_date' => 'date_format:Ymd',
            'to_date' => 'date_format:Ymd',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
