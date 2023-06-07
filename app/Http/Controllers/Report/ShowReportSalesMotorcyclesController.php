<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Services\Report\ShowReportSalesMotorcyclesServices;
use Exception;
use Illuminate\Http\JsonResponse;

class ShowReportSalesMotorcyclesController extends Controller
{
    protected $showReportSalesMotorcyclesServices;

    public function __construct(ShowReportSalesMotorcyclesServices $showReportSalesMotorcyclesServices)
    {
        $this->showReportSalesMotorcyclesServices = $showReportSalesMotorcyclesServices;
    }

    public function show() : JsonResponse {
        try {
            $data = $this->showReportSalesMotorcyclesServices->showData();
            $result = response()->json([
                'success' => true,
                'messages' => "Daftar Penjualan kendaraan Motor",
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return $result;
    }
}
