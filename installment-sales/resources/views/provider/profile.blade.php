@extends('layouts.main')

@section('contents')
    <div class="d-flex flex-column">
        <div class="description border-1 border-secondary bg-dark text-white p-2 rounded-3">
            <div>
                <h3>{{$provider->firstname}} {{$provider->lastname}}</h3>
            </div>
            <div>
                <h5 class="text-center me-2">Work Field: {{$provider->workField->name}} </h5>

            </div>
            <div>
                <h5 class="text-end me-2">number Of Services: {{$services->count()}}</h5>
            </div>
        </div>
        <div class="services mt-2 p-2">
            <div class="row justify-content-between">
                @if($services->count() > 0)
                    @foreach($services as $service)
                        <div class="mb-2 col-lg-6">
                            <div class="card p-3">
                                <h2 class="card-title h4 border-bottom border-1 border-secondary">{{$service->title}}</h2>
                                <p class="card-text">
                                    {{$service->description}}
                                </p>
                                <a class="btn btn-outline-danger mb-1" href="#!">Payment Conditions</a>
                                <a class="btn btn-outline-primary" href="#!">Chat With Provider</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="fs-1 alert alert-danger justify-content-center d-flex align-items-center">
                        This Provider Has No Service.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
