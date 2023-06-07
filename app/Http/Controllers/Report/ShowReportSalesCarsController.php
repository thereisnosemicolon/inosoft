<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Services\Report\ShowReportSalesCarsServices;
use Exception;
use Illuminate\Http\JsonResponse;

class ShowReportSalesCarsController extends Controller
{
    protected $showReportSalesCarsServices;

    public function __construct(ShowReportSalesCarsServices $showReportSalesCarsServices)
    {
        $this->showReportSalesCarsServices = $showReportSalesCarsServices;
    }

    public function show() : JsonResponse {
        $result = ['title' => 'Success', 'messages' => 'Data Penjualan Mobil', 'status' => 200];
        try {
            $result['data'] = $this->showReportSalesCarsServices->showData();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
