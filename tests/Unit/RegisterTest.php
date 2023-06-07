<?php

namespace Tests\Unit;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function test_register_not_valid_email() {
        $response = $this->postJson('/api/register', ['email' => 'johndoe', 'password' => 'kevinkevinkevin']);
        $response
            ->assertStatus(409)
            ->assertJson([
                'success' => false,
        ]);
    }

    public function test_register_exist_credentials() {
        $this->postJson('/api/register', ['email' => 'kvnprtm.ringo101@gmail.com', 'password' => 'kevinkevinkevin']);
        $response = $this->postJson('/api/register', ['email' => 'kvnprtm.ringo98@gmail.com', 'password' => 'kevinkevinkevin']);
        $response
            ->assertStatus(409)
            ->assertJson([
                'success' => false,
        ]);
    }
}
