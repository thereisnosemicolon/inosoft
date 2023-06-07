<?php

namespace App\Repositories\Cars;

use App\Models\Cars;

class PostCarsRepositories
{
    protected $cars;

    public function __construct(Cars $cars)
    {
        $this->cars = $cars;
    }

    public function savePostData($data) : Cars {
        $post = $this->cars;
        $post->tahun_keluaran = $data['tahun_keluaran'];
        $post->warna = $data['warna'];
        $post->harga = $data['harga'];
        $post->mesin = $data['mesin'];
        $post->kapasitas_penumpang = $data['kapasitas_penumpang'];
        $post->tipe = $data['tipe'];
        $post->save();
        return $post->fresh();
    }
}
