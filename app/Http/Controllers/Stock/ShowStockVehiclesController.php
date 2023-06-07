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
        $result = ['title' => 'Success', 'messages' => 'Stok Kendaraan' , 'status' => 200];
        try {
            $result['data']['cars'] = $this->showMotorcyclesServices->showData();
            $result['data']['motorcycles'] = $this->showCarsServices->showData();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
