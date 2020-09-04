<?php

namespace App\Containers\EducationalBackground\Tasks;

use App\Containers\EducationalBackground\Data\Repositories\EducationalBackgroundRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Request;

class CreateEducationalBackgroundTask extends Task
{

    protected EducationalBackgroundRepository $repository;

    public function __construct(EducationalBackgroundRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $photo = null;
            if (array_key_exists('photo', $data)) {
                $photo = $data['photo'];
                unset($data['photo']);
            }
            $educationalBackground = $this->repository->create($data);
            if ($photo !== null) {
                $educationalBackground->addMediaFromRequest('photo')
                    ->usingFileName(md5((Request::file('photo')->getClientOriginalName() . Carbon::now()->toTimeString())) . '.' . Request::file('photo')->getClientOriginalExtension())
                    ->toMediaCollection('edu-bg');
            }
        } catch (Exception $exception) {
            throw new CreateResourceFailedException($exception->getMessage());
        }

        return $educationalBackground;
    }
}
