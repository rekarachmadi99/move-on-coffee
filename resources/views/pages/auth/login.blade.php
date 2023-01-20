@extends('layouts.auth');

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card o-hidden shadow-lg my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 m-4 font-weight-bold">Move On Coffee & Space</h1>
                        </div>
                        @include('partials.session_alerts')
                        <form class="user" action="{{ route('login.post') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email"
                                    class="form-control form-control-user @error('email')
                                    {{ 'is-invalid' }}
                                @enderror"
                                    name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password"
                                    class="form-control form-control-user @error('password')
                                {{ 'is-invalid' }}
                            @enderror"
                                    name="password" id="password" placeholder="password">
                                @error('password')
                                    <p class="text-danger ml-1 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('lupa.password.get') }}">Lupa Password ?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
