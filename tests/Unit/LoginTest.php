<?php

namespace Tests\Unit;

use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_login_not_exist_credentials() {
        $response = $this->postJson('/api/login', ['email' => 'johndoe@gmail.com', 'password' => 'kevinkevinkevin']);
        $response
            ->assertStatus(400)
            ->assertJson([
                'success' => false,
        ]);
    }

    public function test_login_not_valid_email() {
        $response = $this->postJson('/api/login', ['email' => 'johndoe', 'password' => 'kevinkevinkevin']);
        $response
            ->assertStatus(409)
            ->assertJson([
                'success' => false,
        ]);
    }

    public function test_login_exist_credentials() {
        $response = $this->postJson('/api/login', ['email' => 'kvnprtm.ringo98@gmail.com', 'password' => 'kevinkevinkevin']);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
            ]);
    }

    public function test_login_has_token(){
        $response = $this->postJson('/api/login', ['email' => 'kvnprtm.ringo98@gmail.com', 'password' => 'kevinkevinkevin']);
        $response
            ->assertStatus(201)
            ->assertJson([
                'data' => !null,
            ]);
    }
}
