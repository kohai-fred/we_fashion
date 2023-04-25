 @extends('admin.admin')

@section('title', $category ->exists ? "Éditer une catégorie" : "Créer une catégorie")

@section('content')
    <h1>@yield('title')</h1>

    <form class="vstack gap-2"
        action="{{ route($category->exists ? 'admin.category.update' : 'admin.category.store', $category)}}" method="post">
        @csrf
        @method($category->exists ? 'put' : 'post')

        @include('shared.input', ['name' => 'name', 'label' => 'Nom','value'=> $category->name ])

        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-primary">
                @if ($category->exists)
                    Modifier la catégorie
                @else
                    Créer une nouvelle catégorie
                @endif
            </button>
        </div>
    </form>
@endsection
