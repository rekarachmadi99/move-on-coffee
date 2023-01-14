<?php

namespace App\Http\Controllers;

use App\Models\AkunPegawai;
use App\Models\ResetPassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->role == ['Owner', 'Admin']) {
                return redirect(route('dashboard.get'));
            } else {
                return redirect(route('data.barang.get'));
            }
        }
        return view('pages.auth.login', [
            'title' => 'Login'
        ]);
    }

    public function login_post(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Email tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Password harus lebih dari 6 karakter!'
        ]);
        $kredensial = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'Admin') {
                return redirect(route('dashboard.get'));
            } elseif ($user->role == 'Owner') {
                return redirect(route('dashboard.get'));
            } elseif ($user->role == 'Pegawai') {
                return redirect(route('data.barang.get'));
            }
        }
        return redirect(route('login'))->with('error', 'Email dan password yang anda masukan salah!');
    }

    public function lupa_password()
    {
        if ($user = Auth::user()) {
            if ($user->role == ['Owner', 'Admin']) {
                return redirect(route('dashboard.get'));
            } else {
                return redirect(route('data.barang.get'));
            }
        }
        return view('pages.auth.lupa_password', [
            'title' => 'Lupa Password'
        ]);
    }

    public function lupa_password_post(Request $request)
    {
        if ($user = Auth::user()) {
            if ($user->role == ['Owner', 'Admin']) {
                return redirect(route('dashboard.get'));
            } else {
                return redirect(route('data.barang.get'));
            }
        }

        $request->validate([
            'email' => 'required|email'
        ]);

        $token = Str::random(64);

        $password_resets = new ResetPassword();
        $password_resets->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('pages.auth.email_reset_password', ['token' => $token, 'title' => 'Reset Password'], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect(route('lupa.password.get'))->with('success', 'Link telah kami kirim ke gmail anda!');
    }

    public function reset_password($token)
    {
        $reset_password = ResetPassword::where('token', $token)->first();
        if ($reset_password == null) {
            return redirect(route('lupa.password.get'))->with('error', 'Token tidak ditemukan!');
        }
        return view('pages.auth.reset_password', [
            'title' => 'Reset Password',
            'reset_password' => $reset_password
        ]);
    }

    public function reset_password_put(Request $request)
    {
        $this->validate($request, [
            'password_baru' => 'required|same:konfirmasi_password|min:6|max:255',
            'konfirmasi_password' => 'required|min:6|max:255'
        ]);
        $akun_pegawai = AkunPegawai::where('email', $request->email);
        $akun_pegawai->update([
            'email_verified_At' => Carbon::now(),
            'password' => bcrypt($request->password_baru)
        ]);

        ResetPassword::where(['email' => $request->email])->delete();

        return redirect('/')->with('success', 'Password berhasil diganti!');
    }
}
