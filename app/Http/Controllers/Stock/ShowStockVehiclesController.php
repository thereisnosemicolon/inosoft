<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Services\Cars\ShowCarsServices;
use App\Services\Motorcycles\ShowMotorcyclesServices;
use Exception;
use Illuminate\Http\JsonResponse;

class ShowStockVehiclesController extends Controller
{
    protected $showMotorcyclesServices;
    protected $showCarsServices;

    public function __construct(ShowMotorcyclesServices $showMotorcyclesServices, ShowCarsServices $showCarsServices)
    {
        $this->showMotorcyclesServices = $showMotorcyclesServices;
        $this->showCarsServices = $showCarsServices;
    }

    public function show() : JsonResponse {
        try {
            $cars = $this->showMotorcyclesServices->showData();
            $motorcycles = $this->showCarsServices->showData();
            $result = response()->json([
                'success' => true,
                'messages' => "Daftar Stock Kendaraan",
                'data' => [
                    'Mobil' => $cars,
                    'Motor' => $motorcycles
                ]
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
