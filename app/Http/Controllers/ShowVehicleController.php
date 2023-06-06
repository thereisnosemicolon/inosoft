<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class ShowVehicleController extends Controller
{

    public function show(){
        return response()->json([
            'status' => 200,
            'messages' => Vehicle::all()
        ]);
    }
}
