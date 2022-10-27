<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthenticateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
      if(Auth::check()) return redirect()->route('dashboard');
      return view('auth.login');
    }
    
    public function authenticate(AuthenticateRequest $request)
    {
      if(Auth::check()) return redirect()->route('dashboard');

      $credentials = $request->validated();
      $user = User::where('email', $credentials['email'])->first();
      if(!$user)
        return back()->withErrors(['email' => 'Email not found.']);
      
      if(!auth()->attempt($credentials))
        return back()->withErrors(['password' => 'Password is incorrect.']);
      return redirect()->route('dashboard');      
    }

    public function logout()
    {
      Auth::logout();
      return redirect()->route('login');
    }
}
