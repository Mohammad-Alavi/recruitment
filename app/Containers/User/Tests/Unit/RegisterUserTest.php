<?php

namespace App\Containers\User\Tests\Unit;

use App\Containers\User\Actions\RegisterUserAction;
use App\Containers\User\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

/**
 * Class CreateUserTest.
 *
 * @group user
 * @group unit
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class RegisterUserTest extends TestCase
{
    private DataTransporter $transporter;
    private RegisterUserAction $action;
    private array $data;

    public function setUp(): void
    {
        parent::setUp();
        $this->data = [
            'email' => 'Mahmoud@test.test',
            'password' => 'so-secret',
        ];
        $this->transporter = new DataTransporter($this->data);
        $this->action = App::make(RegisterUserAction::class);
    }

    public function testCreateIranianUser(): void
    {
        $nationalCode = '1810090997';
        $countryId = 1;
        $this->transporter->national_code = $nationalCode;
        $this->transporter->country_id = $countryId;
        $user = $this->action->run($this->transporter);

        $this::assertEquals($nationalCode, $user->national_code);
        $this->assertEquals($countryId, $user->country_id);
        $this->assertEquals('ایران', $user->country->name);
    }

    public function testCreateNotIranianUser(): void
    {
        $foreignNationalCode = '1234567891234';
        $countryId = 2;
        $this->transporter->foreign_national_code = $foreignNationalCode;
        $this->transporter->country_id = $countryId;
        $user = $this->action->run($this->transporter);

        $this->assertEquals($foreignNationalCode, $user->foreign_national_code);
        $this->assertEquals($countryId, $user->country_id);
        $this->assertEquals('افغانستان', $user->country->name);
    }
}
