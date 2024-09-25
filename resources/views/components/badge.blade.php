@if ($badge)
    <span {{ $attributes->merge(['class' => $class]) }}>{{ $slot }} </span>
@else
    <a {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</a>
@endif
