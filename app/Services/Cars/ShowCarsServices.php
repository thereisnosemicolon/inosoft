<?php

namespace App\Services\Cars;

use App\Repositories\Cars\ShowCarsRepositories;
use Illuminate\Database\Eloquent\Collection;

class ShowCarsServices
{

    protected $showCarsRepositories;

    public function __construct(ShowCarsRepositories $showCarsRepositories)
    {
        $this->showCarsRepositories = $showCarsRepositories;
    }

    public function showData() : Collection {
        return $this->showCarsRepositories->getAll();
    }
}
