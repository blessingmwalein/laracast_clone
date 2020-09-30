<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;
use Mail;
use App\Mail\ConfirmYourEmail;
use App\User;

class RegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_a_user_has_a_dafault_username_after_registration()
    {

        $this->post('/register', [
            'name' => 'Blessing Mwale',
            'email' => 'blessingmwalein@outlook.com',
            'password' => 'x.bling99'
        ])->assertRedirect();

        $this->assertDatabaseHas('users', [
            'username' => Str::slug("blessing mwale")
        ]);
    }

    public function test_an_email_is_sent_to_newly_registered_users()
    {

        $this->withoutExceptionHandling();
        Mail::fake();

        //register new user
        $this->post('/register', [
            'name' => 'Denzel Mwale',
            'email' => 'blessing@outlook.com',
            'password' => 'x.bling99'
        ])->assertRedirect();


        //ssert that a particular email was sent
        Mail::assertSent(ConfirmYourEmail::class);
    }

    public function test_a_user_has_token_after_registration()
    {

        $this->post('/register', [
            'name' => 'Denzil Mwale',
            'email' => 'blessing1@outlook.com',
            'password' => 'x.bling99'
        ])->assertRedirect();

        $user = User::find(1);
        $this->assertNotNull($user->confirm_token_);
        $this->assertFalse($user->isConfirmed());
    }
}
