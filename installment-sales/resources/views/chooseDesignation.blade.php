@extends('layouts.main')
@section('title','Choose Designation')
@section('contents')
    <div class="choose-designation mt-5 row justify-content-center align-content-center">
        <div class="card text-center col-lg-4 col-sm-8 p-1">
            <div class="card-header text-center bg-dark text-white">
                Choose Your Designation
            </div>
            <div class="card-body p-2">
                <p class="my-1 bg-secondary rounded-1 p-3 my-2">
                    <a class="text-decoration-none text-white" href="{{route('client.login-form')}}">Client</a>
                </p>
                <p class="my-1 bg-secondary rounded-1 p-3 my-2">
                    <a class="text-decoration-none text-white" href="#">Provider</a>
                </p>
            </div>
        </div>
    </div>
@endsection
