{{-- @if ($label)
    <label for="{{ $id }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
@endif --}}

@if ($type === 'select')
    <label for="{{ $id }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <select id="{{ $id }}" name="{{ $name }}" {{ $attributes->merge(['class' => $baseClass]) }}>
        {{ $slot }}
    </select>
    @if ($error)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $error }}</p>
    @endif
@elseif ($type === 'checkbox')
    <div class="flex items-center mb-4">
        <input id="{{ $id }}" type="checkbox" name="{{ $name }}"
            {{ $attributes->merge(['class' => 'w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600']) }}>
        <label for="{{ $id }}"
            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $label }}</label>
    </div>
@elseif ($type === 'radio')
    <div class="flex items-center mb-4">
        <input id="{{ $id }}" type="radio" name="{{ $name }}"
            {{ $attributes->merge(['class' => 'w-4 h-4 border-gray-300 focus:ring-2 focus:ring-primary-600 dark:focus:ring-primary-600 dark:focus:bg-primary-600 dark:bg-gray-700 dark:border-gray-600']) }}>
        <label for="{{ $id }}"
            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $label }}</label>
    </div>
@elseif ($type === 'file')
    <label for="{{ $id }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <input id="{{ $id }}" type="file" name="{{ $name }}"
        {{ $attributes->merge(['class' => !$error ? 'block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400' : 'block w-full text-sm text-red-600 border border-red-500 rounded-lg cursor-pointer bg-red-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400']) }}>
    @if ($error)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $error }}</p>
    @endif
@else
    <label for="{{ $id }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}"
        {{ $attributes->merge(['class' => $baseClass]) }}>
    @if ($error)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $error }}</p>
    @endif
@endif