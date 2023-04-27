@php
    $categoryName = ucfirst(request()->route('slug'));
    $categoryName = str_replace('-',' ',$categoryName);
@endphp
@extends('baseClient')
@section('title', 'Catégorie')

@section('content')
    <h1>Categorie {{ $categoryName }}</h1>
    @foreach ($products as $product)
        <div class="mb-4">
            {{ $product->title }}
        </div>
    @endforeach
@endsection
