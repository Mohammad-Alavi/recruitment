<?php

namespace App\Containers\User\Tests\Unit;

use App\Containers\User\Actions\UpdateUserAction;
use App\Containers\User\Data\Transporters\UpdateUserTransporter;
use App\Containers\User\Models\User;
use App\Containers\User\Tests\TestCase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

/**
 * Class UpdateUserTest.
 *
 * @group user
 * @group unit
 */
class UpdateUserTest extends TestCase
{
	protected User $user;
	protected UpdateUserAction $action;
	protected UpdateUserTransporter $transporter;

	public function setUp(): void
	{
		parent::setUp();
		$this->action = App::make(UpdateUserAction::class);

	}

	public function tearDown(): void
	{
		parent::tearDown();
		unset($this->user, $this->action, $this->transporter);
	}

	public function testUpdateUserTest(): void
	{
		$this->user = factory(User::class)->create();

		$userData = [
			'id' => $this->user->id,
			'name' => 'محمد',
			'last_name' => 'علوی',
			'password' => 'not-so-secret',
			'gender' => 'female',
			'birth' => '20161225',
			'marital_status' => 'unmarried',
			'military_service_status' => 'done',
			'last_educational_certificate' => 'master',
			'field_of_study' => 'نرم افزار',
			'method_of_introduction' => 'social_media',
			'device' => 'sony-z10',
			'platform' => 'web',
		];

		$this->transporter = new UpdateUserTransporter($userData);
		$updatedUser = $this->action->run($this->transporter);

		foreach ($userData as $key => $value) {
			// check if password is hashed and saved correctly
			if ($key === 'password') {
				$this->assertTrue(Hash::check($userData[$key], $updatedUser->$key), 'passwords are not equal');
				continue;
			}
			if ($key === 'birth') {
				continue;
			}
			$this->assertEquals($updatedUser->$key, $userData[$key]);
		}
	}

	public function testConfirmedFieldShouldNotBeUpdatable(): void
	{
		// Create a user with which is not 'confirmed'
		$this->user = factory(User::class)->create([
			'confirmed' => false
		]);

		$userData = [
			'id' => $this->user->id,
			'name' => 'new name',
			'confirmed' => true,
		];

		$this->transporter = new UpdateUserTransporter($userData);
		$updatedUser = $this->action->run($this->transporter);

		$this->assertFalse($updatedUser->confirmed);
	}
}
