@if(session('error'))
    <div class="alert-danger alert text-center">
        {{session('error')}}
    </div>
@elseif(session('success'))
    <div class="massage alert alert-success text-center">
        {{session('success')}}
    </div>
@endif
