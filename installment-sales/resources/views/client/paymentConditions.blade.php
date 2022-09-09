@extends('layouts.main')
@section('title','Service Payment Conditions')
@section('contents')
    <div class="d-flex flex-column">
        @include('massages')
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
                                    Total Increase In Percentage :  {{$payment_condition->total_increase_in_percentage}}%
                                </p>
                                <p class="card-text">
                                   Number Of Instalment :  {{$payment_condition->number_of_instalments}}
                                </p>
                                <p class="card-text">
                                    Duration Of Each Instalment :  {{$payment_condition->duration_of_each_instalment}}
                                </p>
                                <a class="btn btn-outline-success mb-1" href="{{route('client.requested-services.request-service',['service_id'=>$service->id,'payment_condition_id'=>$payment_condition->id])}}">Request</a>
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
