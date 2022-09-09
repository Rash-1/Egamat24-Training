@extends('layouts.providers')
@section('title','Requested Services')
@section('contents')
    @include('massages')
    @if($requested_services->count() > 0)
        <table class="table caption-top">
            <caption>List of Requested Services</caption>
            <thead class="table-dark">
            <tr>
                <th scope="col">Service Title</th>
                <th scope="col">Payment Condition Description</th>
                <th scope="col">Client Username</th>
                <th scope="col">status</th>
                <th scope="col">Request Time</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($requested_services as $requested_service)
                <tr>
                    <td>{{$requested_service->provided_service()->service()->title}}</td>
                    <td>{{$requested_service->provided_service()->paymentCondition()->description}}</td>
                    <td>{{$requested_service->client()->username}}</td>
                    <td>{{$requested_service->status}}</td>
                    <td>{{$requested_service->created_at}}</td>
                    @if($requested_service->status === 'not-answered')
                        <td>
                            <a class="btn btn-success me-1 mb-1"
                               href="{{route('provider.requested-services.accept',['requestedService'=>$requested_service])}}">Accept</a>
                            <a class="btn btn-danger ms-1"
                               href="{{route('provider.requested-services.reject',['requestedService'=>$requested_service])}}">Reject</a>
                        </td>
                    @else
                        <td>
                            <p class="btn btn-info me-1 mb-1">Answered</p>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert-danger alert text-center fs-2">
            Sorry, You Do Not Have Any Service Request Yet!
        </div>
    @endif
@endsection
