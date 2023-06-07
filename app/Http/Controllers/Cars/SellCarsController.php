<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Services\Cars\SellCarsServices;
use Exception;
use Illuminate\Http\JsonResponse;

class SellCarsController extends Controller
{
    protected $sellCarsServices;

    public function __construct(SellCarsServices $sellCarsServices)
    {
        $this->sellCarsServices = $sellCarsServices;
    }

    public function sell($id) : JsonResponse {
        try {
            $data = $this->sellCarsServices->sendPostData($id);
            $result = response()->json([
                'success' => true,
                'messages' => "Sukses menjual mobil",
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
