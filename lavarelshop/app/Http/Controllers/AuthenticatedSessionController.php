<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    //
    protected function authenticated(Request $request, $user)
{
    if (session('url.intended')) {
        return redirect(session('url.intended'));
    }

    return redirect()->intended($this->redirectPath());
}
}
