<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_correct_response_after_user_logs_in()
    {
        $user = factory(User::class)->create();

        $this->postJson('/login', [
            'email' => "admin@admin.com",
            'password' => 'password'
        ])->assertStatus(200)
            ->assertJson([
                'status' => "ok"
            ])->assertSessionHas('success', 'Succefully logged in');
    }
}
