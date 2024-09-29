@if ($button)
    <button {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</a>
@endif
