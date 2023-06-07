<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Services\Cars\ShowCarsServices;
use Exception;
use Illuminate\Http\JsonResponse;

class ShowCarsController extends Controller
{
    protected $showCarsServices;

    public function __construct(ShowCarsServices $showCarsServices)
    {
        $this->showCarsServices = $showCarsServices;
    }

    public function show() : JsonResponse {
        try {
            $data = $this->showCarsServices->showData();
            $result = response()->json([
                'success' => true,
                'messages' => "Daftar Kendaraan Mobil",
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            $result = response()->json([
                'success' => false,
                'messages' => $e->getMessage(),
                'data' => $data
            ], 500);
        }
        return $result;
    }
}
