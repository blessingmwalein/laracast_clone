<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ConfirmEmailController extends Controller
{
    //
    public function index()
    {
        $token = request('token');

        $user = User::where('confirm_token_', $token)->first();

        if ($user) {
            $user->confirm();
            session()->flash('success', 'Your email has been confirmed');
            return redirect('/');
        } else {
            session()->flash('error', 'Confirmation token not recognised');
            return redirect('/');
        }
    }
}
