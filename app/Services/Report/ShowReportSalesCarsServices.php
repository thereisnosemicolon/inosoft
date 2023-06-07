<?php

namespace App\Services\Report;

use App\Repositories\Report\ShowReportSalesCarsRepositories;

class ShowReportSalesCarsServices
{
    protected $showReportSalesCarsRepositories;

    public function __construct(ShowReportSalesCarsRepositories $showReportSalesCarsRepositories)
    {
        $this->showReportSalesCarsRepositories = $showReportSalesCarsRepositories;
    }

    public function showData(){
        return $this->showReportSalesCarsRepositories->getAll();
    }
}
