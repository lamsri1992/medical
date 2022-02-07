<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class LoginController extends Controller
{
    use AuthenticatesUsers {
        attemptLogin as baseAttemptLogin;
    }

    protected $redirectTo = RouteServiceProvider::HOME;

  
    protected function attemptLogin(Request $request)
    {
        config(['database.connections.database' => $request->database]);
        
        return $this->baseAttemptLogin($request);
    }

    protected function authenticated(Request $request, $user)
    {
        session(['database' => $request->database]);
    }

   protected function validateLogin(Request $request)
   {
      $request->validate([
         'database' => [
            'required',
            Rule::in(['mysql', 'pharma']),
         ],
         $this->username() => 'required|string',
         'password' => 'required|string',
      ]);
   }
}
