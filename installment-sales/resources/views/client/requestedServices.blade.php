@extends('layouts.main')
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
                <th scope="col">Provider Username</th>
                <th scope="col">status</th>
                <th scope="col">Request Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($requested_services as $requested_service)
                <tr>
                    <td>{{$requested_service->provided_service()->service()->title}}</td>
                    <td>{{$requested_service->provided_service()->paymentCondition()->description}}</td>
                    <td>{{$requested_service->provider->username}}</td>
                    <td>{{$requested_service->status}}</td>
                    <td>{{$requested_service->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert-danger alert text-center fs-2">
            You Do Not Request Any Services Yet!
        </div>
    @endif
@endsection
