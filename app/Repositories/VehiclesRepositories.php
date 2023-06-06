<?php

namespace App\Http\Repositories;

use App\Models\Vehicle;

class VehiclesRepositories extends Controller
{

    public function __construct(Kendaraan $kendaraan){
        $this->kendaraan = $kendaraan;
    }

    public function index(){
        return response()->json([
            'status' => 200,
            'messages' => Kendaraan::all()
        ]);
    }
}
