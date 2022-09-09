@extends('layouts.providers')
@section('title','Providers Dashboard')
@section('contents')
    @include('massages')
    <div class="row dashboard justify-content-center p-2">
        <div class="col-lg-8 row justify-content-between">
            @if($services->count() > 0)
                @foreach($services as $service)
                    <div class="mb-2 col-lg-6">
                        <div class="card p-3">
                            <div>
                                <h2 class="card-title h4 border-bottom border-1 border-secondary">{{$service->title}}</h2>
                                @if(!$service->paymentConditions()->count() > 0)
                                    <p class="badge bg-info">Only Cash</p>
                                @endif
                            </div>
                            <p class="card-text">
                                {{$service->description}}
                            </p>
                            <p class="card-text">
                                Cash Price : {{$service->cash_price}}
                            </p>
                            @if($service->paymentConditions()->count() > 0)
                                <a class="btn btn-outline-info mb-1"
                                   href="{{route('provider.provided-services.show',['service'=>$service->id])}}">Payment
                                    Conditions</a>
                            @endif
                            <a class="btn btn-outline-danger mb-1" href="{{route('provider.services.delete',['service'=>$service->id])}}">Delete</a>
                            <a class="btn btn-outline-warning mb-1" href="#">Edit</a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="fs-1 alert alert-danger justify-content-center d-flex align-items-center">
                    You Have No Service!
                </div>
            @endif
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">Payment Conditions</div>
                <div class="card-body">
                    @if($payment_conditions->count() > 0)
                        @foreach($payment_conditions as $payment_condition)
                            <div class="d-flex justify-content-between m-1 service">
                                <div>{{$payment_condition->description}}</div>
                                <div class="d-flex">
                                    <div><a href="{{route('provider.payment-conditions.delete',['paymentCondition'=>$payment_condition->id])}}" class="btn-sm btn-outline-danger">Delete</a></div>
                                    <div><a href="{{route('provider.payment-conditions.edit-form',['paymentCondition'=>$payment_condition->id])}}" class="btn-sm btn-outline-warning">Edit</a></div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="d-flex justify-content-center">
                            You Have No Payment Condition!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

