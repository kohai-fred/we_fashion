@php
$promo = 0.8;
$newPrice = $product->price * $promo
@endphp

@extends('baseClient')

@section('content')

    <div class="container mt-5 px-5">
        <div class="d-lg-flex gap-5">
            {{-- Image --}}
            <div class="col-12 col-lg-6" style="position: relative">
                <img src="{{ $product->imageUrl()}}" alt="photo de {{ $product->title }}"
                    class="img-fluid w-100 rounded-2"
                >
                @includewhen($product->promotion,'shared.badgePromo',['right'=> '0.5rem', 'top'=>'0.5rem'])
            </div>
            {{-- Info --}}
            <div class="w-100 my-5">
                <h1 class="text-center pb-5 fw-bold display-2" style="color: var(--custom-primary)">{{ ucfirst($product->title) }}</h1>
                <div class="d-flex justify-content-between align-items-center my-5">
                    <div class="d-flex gap-1">
                        @foreach ($product->categories as $category)
                            <a href="{{ route('category',['slug'=> $category->slug, 'id'=> $category->id])}}" class="btn btn-outline-secondary btn-sm">{{ $category->name }}</a>
                            @endforeach
                    </div>
                    @if (!$product->promotion)
                        <p class="fs-3 fw-bold text-end m-0">{{ $product->price }} €</p>
                    @else
                        <div>
                            <span class="fs-3 fw-bold text-end m-0">{{ ($newPrice ) }} </span>
                            <span class="fs-5 fw-bold text-end m-0 text-danger"><del>{{ $product->price }}</del></span>
                            <span class="fs-3 fw-bold text-end m-0">€</span>
                        </div>
                    @endif
                </div>

                <span class="text-start fw-lighter d-inline-block w-100" style="font-size: 0.85em">ref : {{ $product->reference }}</span>

                <p class="mt-2 mb-5">{{ $product->description }}</p>
                <form action="" method="" class="mt-5">
                    @csrf
                    <div class="form-group">
                        <label for="sizes">Choisissez votre taille</label>
                        <select class="form-control" name="sizes" id="sizes" multiple>
                            @foreach ($product->sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-start mt-4">
                        <button class="btn" style="background: var(--custom-primary-dark)">
                            Ajouter au panier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
