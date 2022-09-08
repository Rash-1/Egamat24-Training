@extends('layouts.main')
@section('title','Home Page')
@section('contents')
    <div class="row">
        <div class="col-lg-9 row justify-content-between">
            @if($services->count() > 0)
                @foreach($services as $service)
                    <div class="mb-2 col-lg-6">
                        <div class="card p-3">
                            <p class="text-muted">{{$service->provider->workfield->name}}(
                                <a class="text-decoration-none" href="{{route('provider.profile',['provider'=>$service->provider->id])}}">
                                    {{$service->provider->username}}
                                </a>
                                )
                            </p>
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
                    Oop!There Is No Service Available.
                </div>
            @endif
        </div>

        <div class="col-lg-3">
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">Services Categories</div>
                <div class="card-body p-1">
                    @if($work_fields->count() > 0)
                        @foreach($work_fields as $work_field)
                            <div class="d-flex justify-content-center m-1 service">
                                <div>
                                    <a href="{{route('work-field-services',['workField'=>$work_field])}}"
                                       class="link-info text-decoration-none">{{$work_field->name}}</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="d-flex justify-content-center">
                            Oop!There Is No Service Area Available.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

