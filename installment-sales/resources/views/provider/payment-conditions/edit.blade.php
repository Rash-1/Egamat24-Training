@extends('layouts.providers')
@section('title','Edit Payment Condition')

@section('contents')
    <div class="client-login-form row justify-content-center">
        <div class="form-header text-dark text-center fs-1">Edit Payment Condition</div>
        <div class="col-lg-4 col-sm-7 border-1 border-dark rounded-1 p-3 bg-secondary">
            @include('massages')
            <form method="post"
                  action="{{route('provider.payment-conditions.update',['paymentCondition'=>$payment_condition])}}">
                @csrf
                <div>
                    <label class="form-label text-white" for="description">Description</label>
                    <input class="form-control" id="description" name="description"
                           value="{{$payment_condition->description}}">
                </div>
                <div>
                    <label class="form-label text-white" for="total-cost">Total Cost</label>
                    <input class="form-control" type="number" id="total-cost" name="total-cost"
                           value="{{$payment_condition->total_cost}}">
                </div>
                <div>
                    <label class="form-label text-white" for="number-of-instalments">Number Of Instalments</label>
                    <input class="form-control" type="number" id="number-of-instalments"
                           name="number-of-instalments" value="{{$payment_condition->number_of_instalments}}">
                </div>
                <div>
                    <label class="form-label text-white" for="each-instalment-amount">Each Instalment Amount</label>
                    <input class="form-control" type="number" id="each-instalment-amount"
                           name="each-instalment-amount" value="{{$payment_condition->each_instalment_amount}}">
                </div>
                <div class="text-center mt-2">
                    <input class="btn col-6 btn-primary" type="submit" value="Edite">
                </div>
            </form>
        </div>
    </div>
@endsection
