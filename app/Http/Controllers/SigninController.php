<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => ['required','email'],
            'password' => 'required|string'
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->has('remember'))) {
            return redirect()->route('admin.index');
        }

        return redirect()->back()->with('error', 'Authentication failed!');
    }
}
