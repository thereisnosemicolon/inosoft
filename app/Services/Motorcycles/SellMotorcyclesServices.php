<?php

namespace App\Services\Motorcycles;

use App\Repositories\Motorcycles\SellMotorcyclesRepositories;

class SellMotorcyclesServices
{
    protected $sellMotorcyclesRepositories;

    public function __construct(SellMotorcyclesRepositories $sellMotorcyclesRepositories)
    {
        $this->sellMotorcyclesRepositories = $sellMotorcyclesRepositories;
    }

    public function sendPostData($id){
        return $this->sellMotorcyclesRepositories->savePostData($id);
    }
}
