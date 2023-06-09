<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $data = $request->validated();

        if(auth("web")->attempt($data)) {
            return redirect()->route('profile.index');
        } else {
            return redirect()->route('auth.login')->withErrors(["password" => 'Неверный логин и/или пароль!']);
        }
    }
}
