<?php

namespace App\Repositories\Motorcycles;

use App\Models\Motorcycles;
use App\Models\ReportSalesMotorcycles;

class SellMotorcyclesRepositories
{
    protected $reportSalesMotorcycles;
    protected $motorcycles;

    public function __construct(ReportSalesMotorcycles $reportSalesMotorcycles, Motorcycles $motorcycles)
    {
        $this->reportSalesMotorcycles = $reportSalesMotorcycles;
        $this->motorcycles = $motorcycles;
    }

    public function savePostData($id) : ReportSalesMotorcycles {
        $motorcycles = $this->motorcycles->find((string) $id);
        $post = $this->reportSalesMotorcycles;
        $post->tahun_keluaran = $motorcycles['tahun_keluaran'];
        $post->warna = $motorcycles['warna'];
        $post->harga = $motorcycles['harga'];
        $post->mesin = $motorcycles['mesin'];
        $post->tipe_transmisi = $motorcycles['tipe_transmisi'];
        $post->tipe_suspensi = $motorcycles['tipe_suspensi'];
        $post->save();
        return $post->fresh();
    }
}
