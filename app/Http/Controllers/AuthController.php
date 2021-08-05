<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        //create a new user into the db
        return User::create($request->all());

        //return the jwt token
    }

    public function login(Request $request)
    {
        //
    }
}
