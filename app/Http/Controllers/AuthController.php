<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{ 

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Pengecekan ke tabel login
        $user = DB::table('login')
            ->where('email', $email)
            ->where('password', $password)
            ->first();

        if ($user) {
            return redirect()->route('projects.create');
        } else {
            return view('error');
        }
    }

}
