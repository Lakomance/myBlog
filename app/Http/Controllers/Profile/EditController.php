<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke()
    {
        $user = auth("web")->user();
        return view('profile.edit', compact('user'));
    }
}
