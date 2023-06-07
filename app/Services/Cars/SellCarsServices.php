<?php

namespace App\Services\Cars;

use App\Models\ReportSalesCars;
use App\Repositories\Cars\SellCarsRepositories;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class SellCarsServices
{
    protected $sellCarsRepositories;

    public function __construct(SellCarsRepositories $sellCarsRepositories)
    {
        $this->sellCarsRepositories = $sellCarsRepositories;
    }

    public function sendPostData($id) : ReportSalesCars {
        return $this->sellCarsRepositories->savePostData($id);
    }
}
