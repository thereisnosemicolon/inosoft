<?php

namespace App\Services\Cars;

use App\Repositories\Cars\PostCarsRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PostCarsServices
{
    protected $postCarsRepositories;

    public function __construct(PostCarsRepositories $postCarsRepositories)
    {
        $this->postCarsRepositories = $postCarsRepositories;
    }

    public function sendPostData($data){
        $validator = Validator::make($data, [
            'tahun_keluaran' => 'required|number',
            'warna' => 'required|string',
            'harga' => 'required|number',
            'mesin' => 'required|string',
            'kapasitas_penumpang' => 'required|number',
            'tipe' => 'required'
        ]);
        if($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $result = $this->postCarsRepositories->savePostData($data);
        return $result;
    }
}
