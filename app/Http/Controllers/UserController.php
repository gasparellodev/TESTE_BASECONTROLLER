<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends BaseController
{
    public function __construct()
    {
        $this -> dados = User::class;
    }

}
