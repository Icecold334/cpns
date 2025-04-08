@if ($button)
    <button {{ $attributes->merge(['class' => $classs]) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => $classs]) }}>{{ $slot }}</a>
@endif
