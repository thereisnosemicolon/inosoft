<?php

namespace App\Repositories\Report;

use App\Models\ReportSalesMotorcycles;
use Illuminate\Database\Eloquent\Collection;

class ShowReportSalesMotorcyclesRepositories
{
    protected $reportSalesMotorcycles;

    public function __construct(ReportSalesMotorcycles $reportSalesMotorcycles)
    {
        $this->reportSalesMotorcycles = $reportSalesMotorcycles;
    }

    public function getAll() : Collection {
        return $this->reportSalesMotorcycles->get();
    }
}
