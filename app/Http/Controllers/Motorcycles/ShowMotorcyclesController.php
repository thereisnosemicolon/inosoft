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
        $result = ['status' => 200];
        try {
            $result['data'] = $this->showMotorcyclesServices->showData();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

}
