<?php

namespace App\Http\Controllers;

use App\Models\NewUser;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function main()
    {
        $users = NewUser::all();
        return view('forms.register', [
            'title' => 'Register Form',
            'users' => $users,
        ]);
    }
}
