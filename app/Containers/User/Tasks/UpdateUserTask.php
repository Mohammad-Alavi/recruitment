<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\InternalErrorException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

/**
 * Class UpdateUserTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UpdateUserTask extends Task
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($userData, $userId): User
    {
        if (empty($userData)) {
            throw new UpdateResourceFailedException('Inputs are empty.');
        }

        // Hash the password if exist
        if (array_key_exists('password', $userData)) {
            $userData['password'] = Hash::make($userData['password']);
        }

        try {
            $user = $this->repository->update($userData, $userId);

            if (array_key_exists('avatar', $userData)) {
                $user->addMediaFromRequest('avatar')
                    ->usingFileName(md5((Request::file('avatar')->getClientOriginalName() . Carbon::now()->toTimeString())) . '.' . Request::file('avatar')->getClientOriginalExtension())
                    ->toMediaCollection('avatar');
            }
        } catch (ModelNotFoundException $exception) {
            throw new NotFoundException('User Not Found.');
        } catch (Exception $exception) {
            throw new InternalErrorException();
        }

        return $user;
    }
}
