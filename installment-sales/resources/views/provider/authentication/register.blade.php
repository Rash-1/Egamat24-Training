@extends('layouts.main')
@section('title','Providers Register')

@section('contents')
    <div class="client-login-form row justify-content-center">
        <div class="form-header text-dark text-center fs-1">Register</div>
        <div class="col-lg-4 col-sm-7 border-1 border-dark rounded-1 p-3 bg-secondary">
            @include('massages')
            <form method="post" action="{{route('provider.register')}}">
                @csrf
                <div>
                    <label class="form-label text-white" for="first-name">First Name</label>
                    <input class="form-control" type="text" id="first-name" name="firstName">
                </div>
                <div>
                    <label class="form-label text-white" for="last-name">Last Name</label>
                    <input class="form-control" type="text" id="last-name" name="lastName">
                </div>
                <div>
                    <label class="form-label text-white" for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username">
                </div>
                <div>
                    <label class="form-label text-white" for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                <div>
                    <label class="form-label text-white" for="workField">Field Of Work</label>
                    <select class="form-select" name="workField" id="workField">
                        @foreach(\App\Models\WorkField::all() as $workField)
                            <option value="{{$workField->id}}">{{$workField->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center mt-2">
                    <input class="btn col-6 btn-primary" type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
@endsection

