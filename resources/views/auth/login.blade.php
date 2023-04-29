@extends('admin.baseAdmin')

@section('title', 'Se connecter')

@section('content')

    <div class="mt-4 container">
        <h1>@yield('title')</h1>

        <form action="{{ route('login')}}" method="post" class="vstack gap-3">
            @csrf
            @include('shared.input', ['type' => 'email' ,'name' => 'email', 'class' => 'col'])
            @include('shared.input', ['type' => 'password' ,'name' => 'password', 'class' => 'col', 'label' => 'Mot de passe'])

            <div><button class="btn btn-primary">Se connecter</button></div>
        </form>
    </div>

@endsection
