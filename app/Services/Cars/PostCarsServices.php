<?php

namespace App\Services\Cars;

use App\Models\Cars;
use App\Repositories\Cars\PostCarsRepositories;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PostCarsServices
{
    protected $postCarsRepositories;

    public function __construct(PostCarsRepositories $postCarsRepositories)
    {
        $this->postCarsRepositories = $postCarsRepositories;
    }

    public function sendPostData($data) : Cars {
        $validator = Validator::make($data, [
            'tahun_keluaran' => 'required|string',
            'warna' => 'required|string',
            'harga' => 'required|string',
            'mesin' => 'required|string',
            'kapasitas_penumpang' => 'required|string',
            'tipe' => 'required|string'
        ]);
        if($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $result = $this->postCarsRepositories->savePostData($data);
        return $result;
    }
}
