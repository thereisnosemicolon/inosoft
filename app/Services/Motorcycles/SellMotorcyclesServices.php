<?php

namespace App\Services\Motorcycles;

use App\Models\ReportSalesMotorcycles;
use App\Repositories\Motorcycles\SellMotorcyclesRepositories;

class SellMotorcyclesServices
{
    protected $sellMotorcyclesRepositories;

    public function __construct(SellMotorcyclesRepositories $sellMotorcyclesRepositories)
    {
        $this->sellMotorcyclesRepositories = $sellMotorcyclesRepositories;
    }

    public function sendPostData($id) : ReportSalesMotorcycles {
        return $this->sellMotorcyclesRepositories->savePostData($id);
    }
}
