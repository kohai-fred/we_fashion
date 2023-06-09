@extends('admin.baseAdmin')

@section('title', $product->exists ? "Éditer un produit" : "Créer un produit")

@section('content')
    <h1>@yield('title')</h1>

    <form class="vstack gap-2"
        action="{{ route($product->exists ? 'admin.product.update' : 'admin.product.store', $product)}}" method="post"
        enctype="multipart/form-data"
        >
        @csrf
        @method($product->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', ['class'=>'col','label'=> 'Titre', 'name' => 'title', 'value'=> $product->title ])
            <div class="col row">
                @include('shared.input', ['type'=>'number', 'step' => '0.01','class'=>'col','label'=> 'Prix', 'name' => 'price', 'value'=> $product->price ])

            </div>
        </div>

        @include('shared.input', ['type' => 'textarea', 'name' => 'description', 'value'=> $product->description ])

        @include('shared.select', ['name' => 'categories', 'value'=> $product->categories()->pluck('id'), 'options' => $categories, 'multiple'=>true ])
        @include('shared.select', ['name' => 'sizes','value'=> $product->sizes()->pluck('id'), 'options' => $sizes, 'multiple' => true])

        @include('shared.input', ['type' => 'file', 'name' => 'image', 'value'=> $product->image ])


        <div class="row justify-content-center">
            <div class="col row align-items-center">
                @include('shared.checkbox', ['class'=>'col','label'=> 'En promotion', 'name' => 'promotion', 'value'=> $product->promotion ])

                @include('shared.checkbox', ['class'=>'col','label' => 'En ligne', 'name' => 'published', 'value'=> $product->published ])
            </div>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-primary">
                @if ($product->exists)
                    Modifier le produit
                @else
                    Créer un nouveau produit
                @endif
            </button>
        </div>
    </form>
@endsection
