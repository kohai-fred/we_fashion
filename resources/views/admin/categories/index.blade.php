@extends('admin.admin')

@section('title', 'Les catégories')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.category.create')}}" class="btn btn-primary">Nouveau</a>
    </div>


    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="d-flex gap-2 w-100 justify-content-end">
                                <a href="{{ route('admin.category.edit', $category)}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.category.destroy', $category)}}" method="post">
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


    {{ $categories->links() }}
@endsection
