<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        {{-- Tom Select - for multiselect --}}
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    @vite(['resources/css/app.css'])
    @yield('head')
    <title>@yield('title') | @yield('base-title')</title>
    @yield('style')
</head>
<body >
    <header>
        @yield('navbar')
    </header>
    <main class="flex-grow-1 flex-shrink-1">
        @yield('body')
    </main>
    @include('shared.footer')
    @yield('script')
    {{-- Tom Select - catch all multiselect --}}
    <script>
        const selectsMultipleEl = Array.from(document.querySelectorAll('select[multiple]'))
        selectsMultipleEl.forEach(select => {
            new TomSelect(`#${select.id}`,{plugins:{remove_button:{title: 'Supprimer'}}})
        });
    </script>
</body>
</html>
