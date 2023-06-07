<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Services\Cars\SellCarsServices;
use Exception;

class SellCarsController extends Controller
{
    protected $sellCarsServices;

    public function __construct(SellCarsServices $sellCarsServices)
    {
        $this->sellCarsServices = $sellCarsServices;
    }

    public function sell($cars){
        try {
            $result = ['status' => 200, 'title' => "Success", 'messages' => 'Sukses menjual mobil'];
            $result['data'] = $this->sellCarsServices->sendPostData($cars);
        } catch (Exception $e){
            $result = [
                'title' => "Server Error",
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
