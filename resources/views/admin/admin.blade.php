<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    @php
        $route = request()->route()->getName();
    @endphp

    @include('shared.navbar')

    @if (!str_contains($route, 'admin.product.index'))
        <a href="{{ route('admin.product.index') }}" class="m-3 btn btn-outline-primary btn-sm rounded-circle">
            <i class="bi bi-arrow-return-left"></i>
        </a>
    @endif

    <div class="container mt-5" >

        @if (session('success'))
            <div class="alert alert-success fade show d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('success')}}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>
    <script>
        const selectsMultipleEl = Array.from(document.querySelectorAll('select[multiple]'))
        selectsMultipleEl.forEach(select => {
            new TomSelect(`#${select.id}`,{plugins:{remove_button:{title: 'Supprimer'}}})
        });
    </script>
</body>
</html>
