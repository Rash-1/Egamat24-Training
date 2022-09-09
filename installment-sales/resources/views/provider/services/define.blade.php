@extends('layouts.providers')
@section('title','Define New Service')

@section('contents')
    <div class="client-login-form row justify-content-center">
            <div class="form-header text-dark text-center fs-1">Define New Service</div>
            <div class="col-lg-4 col-sm-7 border-1 border-dark rounded-1 p-3 bg-secondary">
                @include('massages')
                <form method="post" action="#">
                    @csrf
                    <div>
                        <label class="form-label text-white" for="title">Title</label>
                        <input class="form-control" type="text" id="title" name="title">
                    </div>
                    <div>
                        <label class="form-label text-white" for="description">Description</label>
                        <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                    </div>
                    <div>
                        <label class="form-label text-white" for="cash-price">Cash Price</label>
                        <input class="form-control" type="number" id="cash-price" name="cash_price">
                    </div>
                    <div>
                        <label class="form-label text-white" for="payment-conditions">Payment Conditions</label>
                        <select size="2" class="form-select p-1" multiple name="payment_conditions[]"
                                id="payment-conditions">
                            @foreach(auth('providers')->user()->paymentConditions()->get()->all() as $payment_condition)
                                <option class="mb-1 border-1 text-primary rounded-2 p-1"
                                        value="{{$payment_condition->id}}">{{$payment_condition->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center mt-2">
                        <input class="btn col-6 btn-primary" type="submit" value="Create">
                    </div>
                </form>
            </div>
    </div>
@endsection
