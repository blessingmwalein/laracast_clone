<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\User;

use Tests\TestCase;

class ConfirmEmailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    // public function test_a_user_can_confirm_email()
    // {
    //     $this->withExceptionHandling();

    //     //create user
    //     //make get request to the comfirm endpoint
    //     //assert that user is cofirmed

    //     $user = factory(User::class)->create();

    //     $this->get("/register/confirm/?token={$user->confirm_token_}")
    //         ->assertRedirect('/')
    //         ->assertSessionHas('success', 'Your email has been confirmed');

    //     $this->assertTrue($user->fresh()->isConfirmed());
    // }


    // public function test_a_user_is_redirected_if_token_is_wrong()
    // {

    //     $user = factory(User::class)->create();

    //     $this->get("/register/confirm/?token=WRONG_TOKEN")
    //         ->assertRedirect('/')
    //         ->assertSessionHas('error', 'Confirmation token not recognised');
    // }
}
