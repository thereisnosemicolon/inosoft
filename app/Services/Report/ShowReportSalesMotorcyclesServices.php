<?php

namespace App\Services\Report;

use App\Repositories\Report\ShowReportSalesMotorcyclesRepositories;

class ShowReportSalesMotorcyclesServices
{
    protected $showReportSalesMotorcyclesRepositories;

    public function __construct(ShowReportSalesMotorcyclesRepositories $showReportSalesMotorcyclesRepositories)
    {
        $this->showReportSalesMotorcyclesRepositories = $showReportSalesMotorcyclesRepositories;
    }

    public function showData(){
        return $this->showReportSalesMotorcyclesRepositories->getAll();
    }
}
