@php
    $categoryName = ucfirst(request()->route('slug'));
    $categoryName = str_replace('-',' ',$categoryName);
@endphp
@extends('baseClient')
@section('title', 'Catégorie')

@section('content')
    @include('shared.cardsList', ['products'=> $products, 'title' => $categoryName])
@endsection
