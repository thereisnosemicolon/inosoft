<?php

namespace App\Http\Controllers\Motorcycles;

use App\Http\Controllers\Controller;
use App\Services\Motorcycles\SellMotorcyclesServices;
use Exception;

class SellMotorcyclesController extends Controller
{
    protected $sellMotorcycleServices;

    public function __construct(SellMotorcyclesServices $sellMotorcycleServices)
    {
        $this->sellMotorcycleServices = $sellMotorcycleServices;
    }

    public function sell($id){
        try {
            $result = ['title' => "Success", 'messages' => 'Sukses menjual motor', 'status' => 200];
            $result['data'] = $this->sellMotorcycleServices->sendPostData($id);
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
