<?php

namespace App\Containers\User\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class RegisterUserRequest.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class RegisterUserRequest extends Request
{

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

    ];

    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [

    ];

    public function rules(): array
    {
        Validator::extend('validate_national_code', function ($attribute, $value, $parameters) {
            return $this->isValidIranianNationalCode($value);
        });

        return [
            'email' => 'required|email|max:40|unique:users,email',
            'password' => 'required|min:6|max:30',
            'country_id' => 'required|exists:countries,id',
            'national_code' => 'bail|requiredIf:country_id,1|validate_national_code',
            'foreign_national_code' => 'required_unless:country_id,1|size:13',
            'name' => 'min:2|max:50',
        ];
    }

    private function isValidIranianNationalCode($input): bool
    {
        if (!preg_match("/^\d{10}$/", $input)) {
            return false;
        }

        $check = (int)$input[9];
        $sum = array_sum(array_map(static function ($x) use ($input) {
                return ((int)$input[$x]) * (10 - $x);
            }, range(0, 8))) % 11;

        return ($sum < 2 && $check == $sum) || ($sum >= 2 && $check + $sum == 11);
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
