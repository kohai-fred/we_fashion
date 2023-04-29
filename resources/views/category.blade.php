@php
    $id = request()->route('id');
    $name = $categories->pluck('name', 'id')[$id];
@endphp
@extends('baseClient')
@section('title', 'Catégorie')

@section('content')
    @include('shared.cardsList', ['products'=> $products, 'title' => 'Catégorie : '.$name])
@endsection
