<?php

namespace App\Repositories\Report;

use App\Models\ReportSalesCars;
use Illuminate\Database\Eloquent\Collection;

class ShowReportSalesCarsRepositories
{
    protected $reportSalesCars;

    public function __construct(ReportSalesCars $reportSalesCars)
    {
        $this->reportSalesCars = $reportSalesCars;
    }

    public function getAll() : Collection {
        return $this->reportSalesCars->get();
    }
}
