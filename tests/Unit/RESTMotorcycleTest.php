<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class RESTMotorcycleTest extends TestCase
{
    public function test_get_data_motorcycles_authorized_token() {
        $user = User::Where('email', 'kvnprtm.ringo98@gmail.com')->first();
        $token = JWTAuth::fromUser($user);
        $response = $this->json('GET', '/api/motorcycles?token='. $token, []);
        $response->assertStatus(200);
    }

    public function test_get_data_motorcycles_unauthenticated() {
        $response = $this->json('GET', '/api/motorcycles', []);
        $response->assertStatus(401);
    }

    public function test_post_data_motorcycles_not_sending_field_value(){
        $user = User::Where('email', 'kvnprtm.ringo98@gmail.com')->first();
        $token = JWTAuth::fromUser($user);
        $response = $this->json('POST', '/api/motorcycles?token='. $token, [
            'tahun_keluaran' => 'whwhw'
        ]);
        $response->assertStatus(500)->assertJson(['messages' => !null]);
    }

    public function test_post_data_motorcycles_not_sending_required_numeric_value(){
        $user = User::Where('email', 'kvnprtm.ringo98@gmail.com')->first();
        $token = JWTAuth::fromUser($user);
        $response = $this->json('POST', '/api/motorcycles?token='. $token, [
            'tahun_keluaran' => 'whwhw', // must be numeric
            'warna' => 'kuning',
            'harga' => '30000', // must be numeric
            'mesin' => "horsepower",
            'tipe_suspensi' => "rear",
            'tipe_transmisi' => "automatic"
        ]);
        $response->assertStatus(500)->assertJson(['messages' => !null]);
    }

    public function test_post_data_success(){
        $user = User::Where('email', 'kvnprtm.ringo98@gmail.com')->first();
        $token = JWTAuth::fromUser($user);
        $response = $this->json('POST', '/api/motorcycles?token='. $token, [
            'tahun_keluaran' => 2003,
            'warna' => 'Abu-abu',
            'harga' => 30000,
            'mesin' => "horsepower",
            'tipe_suspensi' => "rear",
            'tipe_transmisi' => "automatic"
        ]);
        $response->assertStatus(201)->assertJson(['data' => !null]);
    }
}
