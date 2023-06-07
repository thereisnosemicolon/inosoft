<?php

namespace App\Services\Report;

use App\Repositories\Report\ShowReportSalesMotorcyclesRepositories;
use Illuminate\Database\Eloquent\Collection;

class ShowReportSalesMotorcyclesServices
{
    protected $showReportSalesMotorcyclesRepositories;

    public function __construct(ShowReportSalesMotorcyclesRepositories $showReportSalesMotorcyclesRepositories)
    {
        $this->showReportSalesMotorcyclesRepositories = $showReportSalesMotorcyclesRepositories;
    }

    public function showData() : Collection {
        return $this->showReportSalesMotorcyclesRepositories->getAll();
    }
}
