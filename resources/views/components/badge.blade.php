@if ($badge)
    <span {{ $attributes->merge(['class' => $classs]) }}>{{ $slot }} </span>
@else
    <a {{ $attributes->merge(['class' => $classs]) }}>{{ $slot }}</a>
@endif
