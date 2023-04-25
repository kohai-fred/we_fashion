@php
    $route = request()->route()->getName();
@endphp
<li class="nav-item">
    <a href="{{ route('admin.product.create')}}" @class(['nav-link', 'active' => str_contains($route, 'product.')]) >Product</a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.category.create')}}" @class(['nav-link', 'active' => str_contains($route, 'category.')]) >Catégorie</a>
</li>
