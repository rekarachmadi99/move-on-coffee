<?php

namespace App\Http\Controllers;

use App\Models\AkunPegawai;
use App\Models\Barang;
use App\Models\Keuangan;
use App\Models\Pegawai;
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
            if ($user->role == 'Pegawai') {
                return redirect(route('barang.index'));
            }
            return redirect(route('dashboard.index'));
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

            if ($user->role == 'Pegawai') {
                return redirect(route('barang.index'));
            }
            return redirect(route('dashboard.index'));
        }
        return redirect(route('login'))->with('error', 'Email dan password yang anda masukan salah!');
    }

    public function lupa_password()
    {
        if ($user = Auth::user()) {
            if ($user->role == ['Owner', 'Admin']) {
                return redirect(route('dashboard.index'));
            } else {
                return redirect(route('barang.index'));
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
                return redirect(route('dashboard.index'));
            } else {
                return redirect(route('barang.index'));
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

    public function logout(Request $request)
    {
        $request->session()->flush();

        Auth::logout();

        return redirect(route('login'));
    }

    public function dashboard()
    {
        // Grafik Pemasukan, Pemasukan dan Pengeluaran



        $user = Pegawai::where('nik', Auth::user()->nik)->first();
        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'user' => $user,
            'totalPegawai' => Pegawai::where('status_pekerjaan', 'Aktif')->count(),
            'totalBarang' => Barang::count(),
            'totalPemasukan' => Keuangan::where('jenis_transaksi', 'debit')->sum('nominal'),
            'totalPengeluaran' => Keuangan::where('jenis_transaksi', 'kredit')->sum('nominal'),
            'januari_pemasukan' => Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '1')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'februari_pemasukan' => Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '2')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'maret_pemasukan' => Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '3')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'april_pemasukan' => Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '4')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'mei_pemasukan' => Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '5')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'juni_pemasukan' => Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '6')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'juli_pemasukan' => Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '7')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'agustus_pemasukan' => Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '8')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'september_pemasukan' => Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '9')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'oktober_pemasukan' => Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '10')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'november_pemasukan' => Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '11')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'desember_pemasukan' => Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '12')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),

            'januari_pengeluaran' => Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '1')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'februari_pengeluaran' => Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '2')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'maret_pengeluaran' => Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '3')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'april_pengeluaran' => Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '4')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'mei_pengeluaran' => Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '5')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'juni_pengeluaran' => Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '6')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'juli_pengeluaran' => Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '7')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'agustus_pengeluaran' => Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '8')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'september_pengeluaran' => Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '9')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'oktober_pengeluaran' => Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '10')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'november_pengeluaran' => Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '11')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),
            'desember_pengeluaran' => Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '12')->whereYear('tanggal', Carbon::now()->year)->sum('nominal'),

            'januari_pendapatan' => (Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '1')->whereYear('tanggal', Carbon::now()->year)->sum('nominal') - Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '1')->whereYear('tanggal', Carbon::now()->year)->sum('nominal')),
            'februari_pendapatan' => (Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '2')->whereYear('tanggal', Carbon::now()->year)->sum('nominal') - Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '2')->whereYear('tanggal', Carbon::now()->year)->sum('nominal')),
            'maret_pendapatan' => (Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '3')->whereYear('tanggal', Carbon::now()->year)->sum('nominal') - Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '3')->whereYear('tanggal', Carbon::now()->year)->sum('nominal')),
            'april_pendapatan' => (Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '4')->whereYear('tanggal', Carbon::now()->year)->sum('nominal') - Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '4')->whereYear('tanggal', Carbon::now()->year)->sum('nominal')),
            'mei_pendapatan' => (Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '5')->whereYear('tanggal', Carbon::now()->year)->sum('nominal') - Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '5')->whereYear('tanggal', Carbon::now()->year)->sum('nominal')),
            'juni_pendapatan' => (Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '6')->whereYear('tanggal', Carbon::now()->year)->sum('nominal') - Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '6')->whereYear('tanggal', Carbon::now()->year)->sum('nominal')),
            'juli_pendapatan' => (Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '7')->whereYear('tanggal', Carbon::now()->year)->sum('nominal') - Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '7')->whereYear('tanggal', Carbon::now()->year)->sum('nominal')),
            'agustus_pendapatan' => (Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '8')->whereYear('tanggal', Carbon::now()->year)->sum('nominal') - Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '8')->whereYear('tanggal', Carbon::now()->year)->sum('nominal')),
            'september_pendapatan' => (Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '9')->whereYear('tanggal', Carbon::now()->year)->sum('nominal') - Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '9')->whereYear('tanggal', Carbon::now()->year)->sum('nominal')),
            'oktober_pendapatan' => (Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '10')->whereYear('tanggal', Carbon::now()->year)->sum('nominal') - Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '10')->whereYear('tanggal', Carbon::now()->year)->sum('nominal')),
            'november_pendapatan' => (Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '11')->whereYear('tanggal', Carbon::now()->year)->sum('nominal') - Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '11')->whereYear('tanggal', Carbon::now()->year)->sum('nominal')),
            'desember_pendapatan' => (Keuangan::where('jenis_transaksi', 'debit')->whereMonth('tanggal', '12')->whereYear('tanggal', Carbon::now()->year)->sum('nominal') - Keuangan::where('jenis_transaksi', 'kredit')->whereMonth('tanggal', '12')->whereYear('tanggal', Carbon::now()->year)->sum('nominal')),
        ]);
    }
}
