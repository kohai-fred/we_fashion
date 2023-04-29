@extends('baseClient')
@section('title', 'Home')

@section('content')

    @include('shared.cardsList', ['products'=> $products, 'title' => 'Liste des produits'])

@endsection


