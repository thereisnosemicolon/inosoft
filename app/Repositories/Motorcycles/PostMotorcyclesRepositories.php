<?php

namespace App\Repositories\Motorcycles;

use App\Models\Motorcycles;
use Illuminate\Http\Request;

class PostMotorcyclesRepositories
{
    protected $motorcycles;

    public function __construct(Motorcycles $motorcycles)
    {
        $this->motorcycles = $motorcycles;
    }

    public function savePostData($data){
        $post = $this->motorcycles;
        $post->tahun_keluaran = $data['tahun_keluaran'];
        $post->warna = $data['warna'];
        $post->harga = $data['harga'];
        $post->mesin = $data['mesin'];
        $post->tipe_transmisi = $data['tipe_transmisi'];
        $post->tipe_suspensi = $data['tipe_suspensi'];
        $post->save();
        return $post->fresh();
    }
}
