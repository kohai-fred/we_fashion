{{-- @php
    echo '<pre>';
    print_r($product->categories()->pluck('name'));
    echo '</pre>';
@endphp --}}

@extends('baseClient')

@section('content')
    <h1 class="text-center">{{ ucfirst($product->title) }}</h1>
@endsection
