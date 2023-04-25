@php
    $route = request()->route()->getName();
    $isAdminRoute = str_contains($route, 'admin.');
    $textColor = '#66EB9A';
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        @if ($isAdminRoute)
            <p class="navbar-brand my-0" style="color: {{ $textColor }}">We Fashion</p>
        @else
            <a href="/" class="navbar-brand"  style="color: {{ $textColor }}">We Fashion</a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            @includeWhen($isAdminRoute,'shared.navbarLinksAdmin')

        </ul>
        @if ($isAdminRoute)
            <a href="/" class="btn btn-light rounded-circle">
                <i class="bi bi-soundwave"></i>
            </a>
        @endif
        </div>
    </div>
</nav>
