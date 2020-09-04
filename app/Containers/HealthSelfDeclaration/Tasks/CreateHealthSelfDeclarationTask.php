<?php

namespace App\Containers\HealthSelfDeclaration\Tasks;

use App\Containers\HealthSelfDeclaration\Data\Repositories\HealthSelfDeclarationRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateHealthSelfDeclarationTask extends Task
{
    protected HealthSelfDeclarationRepository $repository;

    public function __construct(HealthSelfDeclarationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $userId, array $data)
    {
        $user = User::find($userId);
        throw_if($user === null, CreateResourceFailedException::class);
        $HSD = $user->healthSelfDeclaration;
        if ($HSD->created_at !== null) {
            return $HSD;
        }

        try {
            return $this->repository->create($data);
        } catch (Exception $exception) {
            throw new CreateResourceFailedException($exception->getMessage());
        }
    }
}
