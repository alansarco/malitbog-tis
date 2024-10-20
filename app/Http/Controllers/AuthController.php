<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function login()
  {
    return view('auth.login');
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->only(['email', 'password']);

    if (!Auth::attempt($credentials)) {
      return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
      ])->onlyInput('email');
    }

    $request->session()->regenerate();
    return redirect()->intended('/dashboard');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
  }
}
