<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Cars\ShowCarsServices;
use Exception;

class ShowCarsController extends Controller
{
    protected $showCarsServices;

    public function __construct(ShowCarsServices $showCarsServices)
    {
        $this->showCarsServices = $showCarsServices;
    }

    public function show(){
        $result = ['status' => 200];
        try {
            $result['data'] = $this->showCarsServices->showData();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
