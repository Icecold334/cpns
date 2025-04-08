<li>
    <a {{ $attributes }} href="{{ $href }}"
        class="flex items-center transition duration-200 p-2 {{ Request::is(str_replace('/', '', $href) . '*') ? 'text-primary-950 rounded-lg  bg-gray-100' : 'text-white hover:text-primary-950 rounded-lg hover:bg-gray-100' }}">
        {{ $slot }}
        <span class="ms-3">{{ $title }}</span>
    </a>
</li>
