<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class ReportSalesCars extends Model
{
    use HasFactory;
    protected $collection = 'report_sales_cars';
}
