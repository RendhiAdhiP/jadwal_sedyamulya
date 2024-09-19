<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id_crew' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('id_crew', 'password');


        if (auth()->guard('crew')->attempt($credentials)) {
            return redirect('/jadwal');
        } else {
            return redirect('/');
        }


    }
}
