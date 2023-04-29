@extends('admin.baseAdmin')

@section('title', 'Les produits')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.product.create')}}" class="btn btn-primary">Nouveau</a>
    </div>


    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th class="text-center">Promotion</th>
                    <th class="text-center">En ligne</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            @foreach ($product->categories()->pluck('name') as $key=>$categorie)
                                {{ $categorie }}{{ $key < (count($product->categories()->pluck('name')) - 1) ? ', ': ''}}
                            @endforeach
                        </td>
                        <td class="text-center">
                            @include('shared.checkOrNot',['condition'=>$product->promotion])
                        </td>
                        <td class="text-center">
                            @include('shared.checkOrNot',['condition'=>$product->published])
                        </td>
                        <td>
                            <div class="d-flex gap-2 w-100 justify-content-end">
                                <a href="{{ route('admin.product.edit', $product)}}" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBackdrop_{{ $product->id}}" >
                                    <i class="bi bi-trash3"></i>
                                </button>
                                <!-- Modal -->
                                @include('shared.confirmDeleteModal',['id'=> $product->id,'title' => $product->title, 'route' => route('admin.product.destroy', $product)])
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- It's for the pagination --}}
    {{ $products->links() }}

@endsection
