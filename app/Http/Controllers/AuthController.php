<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\LoginStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    // We are using route from breeze, so we don't need this
    // public function index()
    // {
    //     return Inertia::render('Auth/Login',[
    //         'name' => 'John Doe',
    //         'my_array' => ['one', 'two', 'three'],
    //     ]);
    // }

    // public function anotherPage()
    // {
    //     sleep(3);
    //     return Inertia::render('Auth/AnotherPage');
    // }

    // public function store(LoginStoreRequest $request)
    // {
    //     $findUser = User::where([
    //         'username' => $request->username,
    //         'password' => bcrypt($request->password),
    //     ])->firstOrFail();

    //     if ($findUser) {
    //         return Inertia::render('Auth/Login', [
    //             'error' => 'Invalid credentials',
    //         ]);
    //     }
    // }
}
