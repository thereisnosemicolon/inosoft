<?php

namespace App\Repositories\Cars;

use App\Models\Cars;
use App\Models\ReportSalesCars;

class SellCarsRepositories
{
    protected $reportSalesCars;
    protected $cars;

    public function __construct(ReportSalesCars $reportSalesCars, Cars $cars)
    {
        $this->reportSalesCars = $reportSalesCars;
        $this->cars = $cars;
    }

    public function savePostData($id) : ReportSalesCars {
        $cars = $this->cars->find((string) $id);
        $post = $this->reportSalesCars;
        $post->tahun_keluaran = $cars['tahun_keluaran'];
        $post->warna = $cars['warna'];
        $post->harga = $cars['harga'];
        $post->mesin = $cars['mesin'];
        $post->kapasitas_penumpang = $cars['kapasitas_penumpang'];
        $post->tipe = $cars['tipe'];
        $post->save();
        return $post->fresh();
    }
}
