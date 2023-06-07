<?php

namespace App\Repositories\Motorcycles;

use App\Models\Motorcycles;
use Illuminate\Database\Eloquent\Collection;

class ShowMotorcyclesRepositories
{
    protected $motorcycles;

    public function __construct(Motorcycles $motorcycles){
        $this->motorcycles = $motorcycles;
    }

    public function getAll() : Collection {
        return $this->motorcycles->get();
    }
}
