<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return response() -> json(['user' => User::all()], 200);
    }

    public function show($userId)
    {
        try {

            $user = User::findOrFail($userId);

            return response() -> json(['user' => $user], 200);

        } catch (\Exception $e){

            return response() -> json(['message' => 'User Not Found'], 409);

        }
    }

    public function store(Request $request) {

        $this -> validate ($request, [

            'user_group_id',
            'user_role_id',
            'username' => 'required|string',
            'password' => 'required|confirmed',
            'app_online' => 'required',
            'app_full' => 'required',
            'type' => 'required|string'

        ]);


        try {

            $user = new User;
            $user -> user_group_id = $request -> input('user_group_id');
            $user -> user_roles_id = $request -> input('user_role_id');
            $user -> username = $request -> input('username');
            $plainPassword = $request -> input('password');
            $user -> password = app('hash') -> make($plainPassword);
            $user -> app_online = $request -> input('app_online');
            $user -> app_full = $request -> input('app_full');
            $user -> type = $request -> input('type');


            $user -> save();

            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        }catch (\Exception $e) {

            return response() -> json(['message' => 'User Registration failed!'], 409);

        }
    }
}
