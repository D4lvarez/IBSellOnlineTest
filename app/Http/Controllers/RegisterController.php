<?php

namespace App\Http\Controllers;

use App\Models\NewUser;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function main(Request $request)
    {

        return view('forms.register', [
            'title' => 'Register Form'
        ]);
    }

    public function store(Request $request)
    {
        $username = $request->username;
        $email = $request->email;
        $image = $request->imageUser;
        $phone = $request->phone;

        $path = $image->store('media');

        $new_user = NewUser::create([
            'username' => $username,
            'email' => $email,
            'image' => $path,
            'phone' => $phone,
        ]);
    }

    public function read(Request $request)
    {
        return response()->json(NewUser::all());
    }
}
