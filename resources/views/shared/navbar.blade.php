@php
    $route = request()->route()->getName();
    $isAdminRoute = str_contains($route, 'admin.');
    $isLoginRoute = str_contains($route, 'login');
@endphp

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark" style="box-shadow: 0 3px 2px rgba(33, 33, 33, 0.752)">
    <div class="container-fluid">
        @if ($isAdminRoute)
            <p class="navbar-brand my-0" style="color: var(--custom-primary)">We Fashion</p>
        @else
            <a href="/" class="navbar-brand"  style="color: var(--custom-primary)">We Fashion</a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            @includeWhen($isAdminRoute,'shared.navbarLinksAdmin')
            @if (!$isLoginRoute)
                @includeWhen(!$isAdminRoute,'shared.navbarLinks')
            @endif

        </ul>
        @if ($isAdminRoute)
            <ul class="navbar-nav gap-2">
                <li class="navbar-item">
                    <a href="/" class="btn btn-outline-light rounded-circle">
                        <i class="bi bi-soundwave"></i>
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout')}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger rounded-circle">
                            <i class="bi bi-power" ></i>
                        </button>
                    </form>
                </li>
            </ul>
        @endif
        </div>
    </div>
</nav>
