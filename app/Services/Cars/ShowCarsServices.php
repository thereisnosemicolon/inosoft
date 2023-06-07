<?php

namespace App\Services\Cars;

use App\Repositories\Cars\ShowCarsRepositories;
class ShowCarsServices
{

    protected $showCarsRepositories;

    public function __construct(ShowCarsRepositories $showCarsRepositories)
    {
        $this->showCarsRepositories = $showCarsRepositories;
    }

    public function showData(){
        return $this->showCarsRepositories->getAll();
    }
}
