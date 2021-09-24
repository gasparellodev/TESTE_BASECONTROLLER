<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function login(Request $request)
        {
            $this -> validate ($request, [
                'username' => 'required|string',
                'password' => 'required|string',
            ]);

            $credentials = $request -> only(['username', 'password']);

            if(! $token = Auth::attempt($credentials)) {
                return response() -> json (['message' => 'Unauthorized'], 401);
            }

                return $this -> respondWithToken($token);

        }
}
