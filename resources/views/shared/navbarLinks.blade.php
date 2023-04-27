@php
    $firstParam = count(request()->route()->parameterNames()) ? request()->route()->parameterNames()[0] : null;
    $route = $firstParam ? request()->route()->parameters()[$firstParam] : null;
@endphp

@foreach ($links as $link)
    <li class="nav-item">
        <a href="{{ route('category',['slug'=> $link->slug, 'id'=> $link->id])}}"
            @class(['nav-link', 'active' => $route === $link->slug ]) >
            {{ucfirst($link->name)}}
        </a>
    </li>
@endforeach
