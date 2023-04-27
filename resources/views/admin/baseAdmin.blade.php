@extends('layouts.app')

@section('head')
    {{-- Tom Select - for multiselect --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
@endsection

@section('base-title', 'Admin')

{{-- @section('style')
    <style>
        body{
            background: #0E182A;
            color: #fff;
        }
    </style>
@endsection --}}

@section('body')
    @php
    $route = request()->route()->getName();
    @endphp
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

@endsection

@section('script')
    {{-- Tom Select - catch all multiselect --}}
    <script>
        const selectsMultipleEl = Array.from(document.querySelectorAll('select[multiple]'))
        selectsMultipleEl.forEach(select => {
            new TomSelect(`#${select.id}`,{plugins:{remove_button:{title: 'Supprimer'}}})
        });
    </script>
@endsection
