<?php

namespace App\Http\Controllers\Motorcycles;

use App\Http\Controllers\Controller;
use App\Services\Motorcycles\PostMotorcyclesServices;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostMotorcyclesController extends Controller
{
    protected $postMotorcyclesServices;

    public function __construct(PostMotorcyclesServices $postMotorcyclesServices){
        $this->postMotorcyclesServices = $postMotorcyclesServices;
    }

    public function post(Request $request) : JsonResponse {
        try {
            $data = $this->postMotorcyclesServices->sendPostData($request->all());
            $result = response()->json([
                'success' => true,
                'messages' => "Sukses menambah data motor",
                'data' => $data
            ], 201);
        } catch (Exception $e){
            $result = response()->json([
                'success' => false,
                'messages' => $e->getMessage(),
            ], 500);
        }
        return $result;
    }
}
