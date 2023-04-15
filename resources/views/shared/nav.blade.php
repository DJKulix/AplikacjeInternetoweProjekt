<header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="/index" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Mryg mryg bzz bzz</span>

        </a>
        <p>Express yourself!</p>
    </div>
</header>
<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="/columns" class="nav-link link-dark px-2">Columns</a></li>
            <li class="nav-item"><a href="/mixers" class="nav-link link-dark px-2">Mixers</a></li>
            <li class="nav-item"><a href="/microphones" class="nav-link link-dark px-2">Microphones</a></li>
            <li class="nav-item"><a href="/audio" class="nav-link link-dark px-2">Audio cables</a></li>
            <li class="nav-item"><a href="/controllers" class="nav-link link-dark px-2">DMX controllers</a></li>
            <li class="nav-item"><a href="/fixtures" class="nav-link link-dark px-2">DMX fixtures</a></li>
            <li class="nav-item"><a href="/dmx" class="nav-link link-dark px-2">DMX cables</a></li>
        </ul>
        <ul class="nav">
            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link link-dark px-2" href="{{ route('user.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                    </a>
                </li>
                <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link link-dark px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg></a></li>

            @else
                <li class="nav-item">
                    <a class="nav-link link-dark px-2" href="{{ route('login') }}"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg></a>
                </li>
            @endif
        </ul>
    </div>
</nav>
<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            @can('is-admin')
            <li class="nav-item"><a href="{{route('equipment.index')}}" class="nav-link link-dark px-2">Equipment</a></li>
            <li class="nav-item"><a href="{{route('type.index')}}" class="nav-link link-dark px-2">Types</a></li>
            <li class="nav-item"><a href="{{route('event.index')}}" class="nav-link link-dark px-2">Events</a></li>
            <li class="nav-item"><a href="/userList" class="nav-link link-dark px-2">Users</a></li>
            @endcan
        </ul>

    </div>
</nav>
