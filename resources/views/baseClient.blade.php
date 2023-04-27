@extends('layouts.app')

@section('head')
    @vite(['resources/css/customCard.css'])
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

@section('body')
    @yield('content')
@endsection
