<?php

namespace App\Http\Controllers\Motorcycles;

use App\Http\Controllers\Controller;
use App\Services\Motorcycles\SellMotorcyclesServices;
use Exception;
use Illuminate\Http\JsonResponse;

class SellMotorcyclesController extends Controller
{
    protected $sellMotorcycleServices;

    public function __construct(SellMotorcyclesServices $sellMotorcycleServices)
    {
        $this->sellMotorcycleServices = $sellMotorcycleServices;
    }

    public function sell($id) : JsonResponse {
        try {
            $data = $this->sellMotorcycleServices->sendPostData($id);
            $result = response()->json([
                'success' => true,
                'messages' => "Sukses menjual motor",
                'data' => $data
            ], 200);
        } catch (Exception $e){
            $result = response()->json([
                'success' => false,
                'messages' => $e->getMessage()
            ], 500);
        }
        return $result;
    }
}
