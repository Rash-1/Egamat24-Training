<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">{{$header}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{route('home-page')}}">Home</a></li>
                @if(auth('clients')->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('client.requested-services.show-requests')}}">
                            Requested Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('client.logout')}}">
                            {{auth('clients')->user()->username}}-Log Out
                        </a>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{route('choose-designation')}}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
