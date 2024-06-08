<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    //
    public function login() {
        return response()->view('login');
    }

    public function doLogin(Request $request) {
        # code...
        $user = $request->input('id');
        $password = $request->input('password');

        if (empty($user) || empty($password)) {
            # code...
            return response()->view('login', [
                'title' => 'title Login',
                'error' => 'User or Password is required',
            ]);
        }

        if ($this->userService->login($user, $password)) {
            # code...
            $name = DB::table('users')->where('id','=',$user)->get();
            $request->session()->put('user', $name->value('status'));
            $request->session()->put('nama', $name->value('name'));

            if ($name->value('status') == "TU") {
                return redirect('/tatausaha');
            }
            return redirect('/user');
            // var_dump('succes');
        }

        return response()->view('login', [
            'title' => 'Login Page',
            'error' => 'Username or password is wrong',
        ]);
    }

    public function logout(Request $request) {
        $request->session()->forget('user');
        $request->session()->forget('nama');
        return redirect('/');

    }


}
