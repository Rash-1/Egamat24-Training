@extends('layouts.main')
@section('title','Service Payment Conditions')
@section('contents')
    <div class="d-flex flex-column">
        <div class="description border-1 border-secondary bg-dark text-white p-2 rounded-3">
            <div>
                <h3>{{$service->title}}</h3>
            </div>
            <div>
                <h5 class="text-center me-2">Work Field: {{$service->provider->workField->name}} </h5>
            </div>
            <div>
                <h5 class="text-end me-2">number Of Payment Conditions: {{$payment_conditions->count()}}</h5>
            </div>
        </div>
        <div class="services mt-2 p-2">
            <div class="row justify-content-between">
                @if($payment_conditions->count() > 0)
                    @foreach($payment_conditions as $payment_condition)
                        <div class="mb-2 col-lg-6">
                            <div class="card p-3">
                                <h2 class="card-title h4 border-bottom border-1 border-secondary">{{$payment_condition->description}}</h2>
                                <p class="card-text">
                                   Total Cost :  {{$payment_condition->total_cost}}
                                </p>
                                <p class="card-text">
                                   Number Of Instalment :  {{$payment_condition->number_of_instalments}}
                                </p>
                                <p class="card-text">
                                   Each Instalment Amount :  {{$payment_condition->each_instalment_amount}}
                                </p>
                                <a class="btn btn-outline-success mb-1" href="#!">Request</a>
                                <a class="btn btn-outline-primary" href="#!">Chat With Provider</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="fs-1 alert alert-danger justify-content-center d-flex align-items-center">
                        This Service Only Offered In Cash.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
