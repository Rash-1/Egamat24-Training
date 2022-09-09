@extends('layouts.providers')
@section('title','Provided Services')
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
                <h5 class="text-end me-2">number Of Payment Conditions: {{$service->paymentConditions()->count()}}</h5>
            </div>
        </div>
        <div class="services mt-2 p-2">
            <div class="row justify-content-between">
                @if($provided_services->count() > 0)
                    @foreach($provided_services as $provided_service)
                        <div class="mb-2 col-lg-6">
                            <div class="card p-3">
                                <h2 class="card-title h4 border-bottom border-1 border-secondary">{{$provided_service->paymentCondition()->description}}</h2>
                                <p class="card-text">
                                    Total Cost :  {{$provided_service->paymentCondition()->total_cost}}
                                </p>
                                <p class="card-text">
                                    Number Of Instalment :  {{$provided_service->paymentCondition()->number_of_instalments}}
                                </p>
                                <p class="card-text">
                                    Each Instalment Amount :  {{$provided_service->paymentCondition()->each_instalment_amount}}
                                </p>
                                <a class="btn btn-outline-danger" href="{{route('provider.provided-services.delete',['providedService'=>$provided_service])}}">Delete Provided Service</a>
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
