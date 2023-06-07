<?php

namespace App\Http\Controllers\Motorcycles;

use App\Http\Controllers\Controller;
use App\Services\Motorcycles\PostMotorcyclesServices;
use Exception;
use Illuminate\Http\Request;

class PostMotorcyclesController extends Controller
{
    protected $postMotorcyclesServices;

    public function __construct(PostMotorcyclesServices $postMotorcyclesServices){
        $this->postMotorcyclesServices = $postMotorcyclesServices;
    }

    public function post(Request $request){
        try {
            $result = ['status' => 200];
            $result['data'] = $this->postMotorcyclesServices->sendPostData($request->all());
        } catch (Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
