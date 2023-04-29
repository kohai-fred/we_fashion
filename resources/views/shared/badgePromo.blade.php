@php
    $style ??= '';
    $right ??='';
    $left ??='';
    $top ??='';
    $bottom ??='';
@endphp
<a href="{{ route('solde')}}" class="btn btn-warning rounded-circle shadow-sm"
style="position: absolute; z-index:10;
    right:{{$right}};
    left:{{$left}};
    top:{{$top}};
    bottom:{{$bottom}};
    {{$style}}">
    <i class="bi bi-percent"></i>
</a>
