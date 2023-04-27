@php
    $firstParam = count(request()->route()->parameterNames()) ? request()->route()->parameterNames()[0] : null;
    $route = $firstParam ? request()->route()->parameters()[$firstParam] : null;
@endphp

@foreach ($links as $key => $link)
    <li class="nav-item">
        <a href="{{ route('category',['slug'=> $link, 'id'=> $key])}}"
            @class(['nav-link', 'active' => $route === $link ? true : false]) >
            {{ucfirst($link)}}
        </a>
    </li>
@endforeach
