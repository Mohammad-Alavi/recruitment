<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Hash;

/**
 * Class CreateUserByCredentialsTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class CreateUserByCredentialsTask extends Task
{

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param bool $isClient
     * @param string $email
     * @param string $password
     * @param int $countryId
     * @param string|null $national_code
     * @param string|null $foreign_national_code
     * @param string|null $name
     * @param string|null $gender
     * @param string|null $birth
     *
     * @return  mixed
     */
    public function run(
        bool $isClient = true,
        string $email,
        string $password,
        int $countryId,
        string $name = null,
        string $national_code = null,
        string $foreign_national_code = null,
        string $gender = null,
        string $birth = null
    ): User
    {

        try {
            // create new user
            $user = $this->repository->create([
                'password' => Hash::make($password),
                'email' => $email,
                'country_id' => $countryId,
                'name' => $name,
                'national_code' => $national_code,
                'foreign_national_code' => $foreign_national_code,
                'gender' => $gender,
                'birth' => $birth,
                'is_client' => $isClient,
            ]);

        } catch (Exception $e) {
            throw (new CreateResourceFailedException($e->getMessage()));
        }

        return $user;
    }

}
