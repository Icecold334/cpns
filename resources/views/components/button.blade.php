@if ($button)
    <button type="button" {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</a>
@endif
