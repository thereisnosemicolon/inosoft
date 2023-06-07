<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Services\Cars\PostCarsServices;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostCarsController extends Controller
{
    protected $postCarsServices;

    public function __construct(PostCarsServices $postCarsServices)
    {
        $this->postCarsServices = $postCarsServices;
    }

    public function post(Request $request) : JsonResponse {
        try {
            $data = $this->postCarsServices->sendPostData($request->all());
            $result = response()->json([
                'success' => true,
                'messages' => 'Sukses menambah data mobil',
                'data' => $data
            ], 201);

        } catch (Exception $e){
            $result = response()->json([
                'success' => false,
                'messages' => $e->getMessage()
            ], 500);
        }
        return $result;
    }
}
