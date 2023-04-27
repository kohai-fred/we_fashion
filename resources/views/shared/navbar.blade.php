@php
    $route = request()->route()->getName();
    $isAdminRoute = str_contains($route, 'admin.');
    $textColor = '#66EB9A';
@endphp

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark" style="box-shadow: 0 3px 2px rgba(33, 33, 33, 0.752)">
    <div class="container-fluid">
        @if ($isAdminRoute)
            <p class="navbar-brand my-0" style="color: {{ $textColor }}">We Fashion</p>
            <a href="{{ route('admin.product.index') }}" >
                <i class="bi bi-speedometer2"></i>
            </a>
        @else
            <a href="/" class="navbar-brand"  style="color: {{ $textColor }}">We Fashion</a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            @includeWhen($isAdminRoute,'shared.navbarLinksAdmin')
            @includeWhen(!$isAdminRoute,'shared.navbarLinks')

        </ul>
        @if ($isAdminRoute)
            <a href="/" class="btn btn-light rounded-circle">
                <i class="bi bi-soundwave"></i>
            </a>
        @endif
        </div>
    </div>
</nav>
