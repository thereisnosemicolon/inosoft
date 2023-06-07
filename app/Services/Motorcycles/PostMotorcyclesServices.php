<?php

namespace App\Services\Motorcycles;

use App\Repositories\Motorcycles\PostMotorcyclesRepositories;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PostMotorcyclesServices
{
    protected $postMotorcyclesRepositories;

    public function __construct(PostMotorcyclesRepositories $postMotorcyclesRepositories)
    {
        $this->postMotorcyclesRepositories = $postMotorcyclesRepositories;
    }

    public function sendPostData($data){
        $validator = Validator::make($data, [
            'tahun_keluaran' => 'required|string',
            'warna' => 'required|string',
            'harga' => 'required|string',
            'mesin' => 'required|string',
            'tipe_suspensi' => 'required|string',
            'tipe_transmisi' => 'required|string'
        ]);
        if($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $result = $this->postMotorcyclesRepositories->savePostData($data);
        return $result;
    }
}
