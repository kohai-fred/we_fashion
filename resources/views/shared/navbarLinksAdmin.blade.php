@php
    $route = request()->route()->getName();
@endphp
<li class="nav-item">
    <a href="{{ route('admin.product.index') }}" @class(['nav-link', 'active' => str_contains($route, 'product.index')])>
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.product.create')}}" @class(['nav-link', 'active' => str_contains($route, 'product.create')]) >Product</a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.category.index')}}" @class(['nav-link', 'active' => str_contains($route, 'category.')]) >Catégorie</a>
</li>
