@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card o-hidden shadow-lg my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 m-4">Buat Password Baru</h1>
                        </div>
                        <form class="user" action="{{ route('reset.password.put') }}" method="post">
                            @method('put')
                            @csrf
                            <input type="hidden" name="token" id="token" value="{{ $reset_password->token }}">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control form-control-user"
                                    placeholder="Email" value="{{ $reset_password->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_baru" id="password_baru"
                                    class="form-control form-control-user" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="konfirmasi_password" id="konfirmasi_password"
                                    class="form-control form-control-user" placeholder="Konfirmasi Password">
                            </div>
                            <input class="btn btn-primary btn-user btn-block mt-4" type="submit" value="Reset Password">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
