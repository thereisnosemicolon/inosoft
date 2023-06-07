<?php

namespace App\Services\Motorcycles;

use App\Repositories\Motorcycles\ShowMotorcyclesRepositories;

class ShowMotorcyclesServices
{
    protected $showMotorcyclesRepositories;

    public function __construct(ShowMotorcyclesRepositories $showMotorcyclesRepositories)
    {
        $this->showMotorcyclesRepositories = $showMotorcyclesRepositories;
    }

    public function showData(){
        return $this->showMotorcyclesRepositories->getAll();
    }
}
