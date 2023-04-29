@php
    $firstParam = count(request()->route()->parameterNames()) ? request()->route()->parameterNames()[0] : null;
    $slug = $firstParam ? request()->route()->parameters()[$firstParam] : null;
    $route = request()->route()->getName()
@endphp

<li class="nav-item">
    <a href="{{ route('solde')}}"
        @class(['nav-link', 'active' => $route === 'solde' ]) >
        Solde
    </a>
</li>

@foreach ($links as $link)
    <li class="nav-item">
        <a href="{{ route('category',['slug'=> $link->slug, 'id'=> $link->id])}}"
            @class(['nav-link', 'active' => $slug === $link->slug ]) >
            {{ucfirst($link->name)}}
        </a>
    </li>
@endforeach
