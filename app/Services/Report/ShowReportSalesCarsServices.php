<?php

namespace App\Services\Report;

use App\Repositories\Report\ShowReportSalesCarsRepositories;
use Illuminate\Database\Eloquent\Collection;

class ShowReportSalesCarsServices
{
    protected $showReportSalesCarsRepositories;

    public function __construct(ShowReportSalesCarsRepositories $showReportSalesCarsRepositories)
    {
        $this->showReportSalesCarsRepositories = $showReportSalesCarsRepositories;
    }

    public function showData() : Collection {
        return $this->showReportSalesCarsRepositories->getAll();
    }
}
