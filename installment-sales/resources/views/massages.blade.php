{{--For Customized Errors And Massages--}}
@if(session('error'))
    <div class="alert-danger alert text-center">
        {{session('error')}}
    </div>
@elseif(session('success'))
    <div class="massage alert alert-success text-center">
        {{session('success')}}
    </div>
@endif

{{--For Validation Errors--}}

@if($errors->any())
    <ol class=" list-group list-group-numbered">
    @foreach ($errors->all() as $error)
        <li class="list-group-item list-group-item-danger">
            {{$error}}
        </li>
    @endforeach
    </ol>
@endif

