<?php

namespace App\Containers\Location\Tasks;

use App\Containers\Location\Data\Repositories\LocationRepository;
use App\Containers\Location\Models\Location;
use App\Ship\Parents\Tasks\Task;

class GetAllLocationsTask extends Task
{
    private $repository;

    public function __construct(LocationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return Location::all();
    }
}
