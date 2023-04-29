@extends('layouts.app')

@section('base-title', 'Admin')

@section('navbar')
    @include('shared.navbar')
@endsection

@section('body')

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
