<?php

namespace App\Repositories\Cars;

use App\Models\Cars;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ShowCarsRepositories
{
    protected $cars;

    public function __construct(Cars $cars)
    {
        $this->cars = $cars;
    }

    public function getAll() : Collection {
        return $this->cars->get();
    }
}
