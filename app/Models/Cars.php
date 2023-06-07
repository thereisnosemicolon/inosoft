<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;
    protected $collection = 'cars';
}
