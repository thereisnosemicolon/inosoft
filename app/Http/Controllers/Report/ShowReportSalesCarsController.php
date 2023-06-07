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
        try {
            $data = $this->showReportSalesCarsServices->showData();
            $result = response()->json([
                'success' => true,
                'messages' => "Daftar Penjualan Kendaraan Mobil",
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            $result = response()->json([
                'success' => false,
                'messages' => $e->getMessage()
            ], 500);
        }
        return $result;
    }
}
