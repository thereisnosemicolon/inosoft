<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Services\Cars\PostCarsServices;
use Exception;
use Illuminate\Http\Request;

class PostCarsController extends Controller
{
    protected $postCarsServices;

    public function __construct(PostCarsServices $postCarsServices)
    {
        $this->postCarsServices = $postCarsServices;
    }

    public function post(Request $request){
        try {
            $data = $request->only([
                'tahun_keluaran',
                'warna',
                'harga',
                'mesin',
                'kapasitas_penumpang',
                'tipe'
            ]);
            $result = ['status' => 200];
            $result['data'] = $this->postCarsServices->sendPostData($data);
        } catch (Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
