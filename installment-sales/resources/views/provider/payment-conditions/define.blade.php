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
                    <label class="form-label text-white" for="total-cost">Total Cost</label>
                    <input class="form-control" type="number" id="total-cost" name="total-cost">
                </div>
                <div>
                    <label class="form-label text-white" for="number-of-instalments">Number Of Instalments</label>
                    <input class="form-control" type="number" id="number-of-instalments"
                           name="number-of-instalments">
                </div>
                <div>
                    <label class="form-label text-white" for="each-instalment-amount">Each Instalment Amount</label>
                    <input class="form-control" type="number" id="each-instalment-amount"
                           name="each-instalment-amount">
                </div>
                <div class="text-center mt-2">
                    <input class="btn col-6 btn-primary" type="submit" value="Create">
                </div>
            </form>
        </div>
    </div>
@endsection
