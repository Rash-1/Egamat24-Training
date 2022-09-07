@extends('layouts.main')
@section('title','Clients Register')

@section('contents')
    <div class="client-login-form row justify-content-center">
        <div class="form-header text-dark text-center fs-1">Register</div>
        <div class="col-lg-4 col-sm-7 border-1 border-dark rounded-1 p-3 bg-secondary">
            @include('massages')
            <form method="post" action="{{route('client.register')}}">
                @csrf
                <div>
                    <label class="form-label text-white" for="firstname">First Name</label>
                    <input class="form-control" type="text" id="firstname" name="firstname">
                </div>
                <div>
                    <label class="form-label text-white" for="lastname">Last Name</label>
                    <input class="form-control" type="text" id="lastname" name="lastname">
                </div>
                <div>
                    <label class="form-label text-white" for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username">
                </div>
                <div>
                    <label class="form-label text-white" for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                <div class="text-center mt-2">
                    <input class="btn col-6 btn-primary" type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
@endsection

