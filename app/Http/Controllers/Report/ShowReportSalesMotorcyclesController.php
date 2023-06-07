<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Services\Report\ShowReportSalesMotorcyclesServices;
use Exception;

class ShowReportSalesMotorcyclesController extends Controller
{
    protected $showReportSalesMotorcyclesServices;

    public function __construct(ShowReportSalesMotorcyclesServices $showReportSalesMotorcyclesServices)
    {
        $this->showReportSalesMotorcyclesServices = $showReportSalesMotorcyclesServices;
    }

    public function show(){
        $result = ['title' => 'Success', 'messages' => 'Data Penjualan Motor', 'status' => 200];
        try {
            $result['data'] = $this->showReportSalesMotorcyclesServices->showData();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
