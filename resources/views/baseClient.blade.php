@extends('layouts.app')

@section('head')
    @vite(['resources/css/customCard.css','resources/css/customPagination.css'])
@endsection

@section('base-title', 'WeFashion')

@section('style')
    <style>
        body{
            background: #0E182A;
            color: #fff;
        }
    </style>
@endsection

@section('navbar')
    @include('shared.navbar', ['links'=>$categories])
@endsection

@section('body')
    @yield('content')
@endsection
