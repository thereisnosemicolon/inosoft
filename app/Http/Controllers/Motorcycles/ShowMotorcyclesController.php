<?php

namespace App\Http\Controllers\Motorcycles;

use App\Http\Controllers\Controller;
use App\Services\Motorcycles\ShowMotorcyclesServices;
use Exception;
use Illuminate\Http\JsonResponse;

class ShowMotorcyclesController extends Controller
{
    protected $showMotorcyclesServices;

    public function __construct(ShowMotorcyclesServices $showMotorcyclesServices)
    {
        $this->showMotorcyclesServices = $showMotorcyclesServices;
    }

    public function show() : JsonResponse {
        try {
            $data= $this->showMotorcyclesServices->showData();
            $result = response()->json([
                'success' => true,
                'messages' => "Daftar kendaraan Motor",
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
