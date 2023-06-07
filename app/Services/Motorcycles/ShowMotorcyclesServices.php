<?php

namespace App\Services\Motorcycles;

use App\Models\Motorcycles;
use App\Repositories\Motorcycles\ShowMotorcyclesRepositories;
use Illuminate\Database\Eloquent\Collection;

class ShowMotorcyclesServices
{
    protected $showMotorcyclesRepositories;

    public function __construct(ShowMotorcyclesRepositories $showMotorcyclesRepositories)
    {
        $this->showMotorcyclesRepositories = $showMotorcyclesRepositories;
    }

    public function showData() : Collection {
        return $this->showMotorcyclesRepositories->getAll();
    }
}
