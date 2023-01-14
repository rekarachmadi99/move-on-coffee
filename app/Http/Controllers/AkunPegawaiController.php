<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunPegawaiController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->role == ['Owner', 'Admin', 'Pegawai']) {
                return redirect()->intended('dashboard');
            }
        }
        return view('pages.auth.login', [
            'title' => 'Login'
        ]);
    }

    
}
