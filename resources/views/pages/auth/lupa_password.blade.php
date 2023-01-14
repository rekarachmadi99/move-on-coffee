@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card o-hidden shadow-lg my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 m-4"><b>Lupa</b> Password?</h1>
                        </div>
                        <p class="mb-4 text-center">
                            Masukkan alamat email yang terkait dengan akun anda dan kami akan mengirimkan tautan untuk
                            mengatur ulang kata sandi anda.
                        </p>
                        @include('partials.session_alerts')
                        <form class="user" action="{{ route('lupa.password.post') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control form-control-user"
                                    placeholder="Email">
                            </div>

                            <input class="btn btn-primary btn-user btn-block" type="submit" value="Reset Password">
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/">Sudah Memiliki Akun? lakukan login!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
