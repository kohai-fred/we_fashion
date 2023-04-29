@php
    $categoryName = ucfirst(request()->route('slug'));
    $categoryName = str_replace('-',' ',$categoryName);
@endphp
@extends('baseClient')
@section('title', 'Solde')

@section('content')
    @include('shared.cardsList', ['products'=> $products, 'title' => 'Solde'])
@endsection
