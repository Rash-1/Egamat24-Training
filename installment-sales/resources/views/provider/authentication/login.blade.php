@extends('layouts.providers')
@section('title','Providers Login')

@section('contents')
    <div class="client-login-form row justify-content-center">
        <div class="form-header text-dark text-center fs-1">Login</div>
        <div class="col-lg-4 col-sm-7 border-1 border-dark rounded-1 p-3 bg-secondary">
        @include('massages')
            <form method="post" action="{{route('provider.login')}}">
                @csrf
                <div>
                    <label class="form-label text-white" for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username">
                </div>
                <div>
                    <label class="form-label text-white" for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                <div class="text-center mt-2">
                    <a class="text-decoration-none text-info" href="{{route('provider.register-form')}}">
                        Not Registered yet!?
                    </a>
                </div>
                <div class="text-center mt-2">
                    <input class="btn col-6 btn-primary" type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
@endsection
