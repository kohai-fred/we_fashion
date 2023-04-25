@extends('admin.admin')

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
                    <th class="d-none d-md-table-cell">Référence</th>
                    <th>Nom</th>
                    {{-- <th>Catégorie</th> --}}
                    <th>Prix</th>
                    <th class="text-center">Promotion</th>
                    <th class="text-center">En ligne</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="d-none d-md-table-cell" style="font-size: 0.75rem">{{ $product->reference }}</td>
                        <td>{{ $product->title }}</td>
                        {{-- <td>{{ $product->category }}</td> --}}
                        <td>{{ $product->price }}</td>
                        <td class="text-center">{{ $product->promotion ? "Oui" : "Non" }}</td>
                        <td class="text-center">
                            @if ($product->published)
                                <i class="bi bi-check2-all" style="color: green"></i>
                                @else

                                <i class="bi bi-check2" style="color: red"></i>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2 w-100 justify-content-end">
                                <a href="{{ route('admin.product.edit', $product)}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.product.destroy', $product)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{ $products->links() }}
@endsection
