@extends('layouts.providers')
@section('title','Define New Payment Condition')

@section('contents')
    <div class="client-login-form row justify-content-center">
        <div class="form-header text-dark text-center fs-1">Define New Payment Condition</div>
        <div class="col-lg-4 col-sm-7 border-1 border-dark rounded-1 p-3 bg-secondary">
            @include('massages')
            <form method="post" action="{{route('provider.payment-conditions.define')}}">
                @csrf
                <div>
                    <label class="form-label text-white" for="description">Description</label>
                    <input class="form-control" id="description" name="description">
                </div>
                <div>
                    <label class="form-label text-white" for="total-increase-in-percentage">Total Increase In Percentage</label>
                    <input class="form-control" type="number" id="total-increase-in-percentage" name="total-increase-in-percentage">
                </div>
                <div>
                    <label class="form-label text-white" for="number-of-instalments">Number Of Instalments</label>
                    <input class="form-control" type="number" id="number-of-instalments"
                           name="number-of-instalments">
                </div>
                <div>
                    <label class="form-label text-white" for="duration-of-each-instalment">Duration Of Each Instalment(Day)</label>
                    <input class="form-control" type="number" id="duration-of-each-instalment"
                           name="duration-of-each-instalment">
                </div>
                <div class="text-center mt-2">
                    <input class="btn col-6 btn-primary" type="submit" value="Create">
                </div>
            </form>
        </div>
    </div>
@endsection
