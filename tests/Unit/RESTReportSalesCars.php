<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class RESTReportSalesCars extends TestCase
{
    public function test_get_data_report_sales_cars_authorized_token() {
        $user = User::Where('email', 'kvnprtm.ringo98@gmail.com')->first();
        $token = JWTAuth::fromUser($user);
        $response = $this->json('GET', '/api/report_sales_cars?token='. $token, []);
        $response->assertStatus(200)->assertJson(['data' => !null]);
    }

    public function test_get_data_report_sales_cars_unauthenticated() {
        $response = $this->json('GET', '/api/report_sales_cars', []);
        $response->assertStatus(401);
    }

}
