@if ($button)
    <button type="button"
        class="text-white bg-primary-600 hover:bg-primary-950 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-primary-950 focus:outline-none dark:focus:ring-pribg-950">
        {{ $slot }}
    </button>
@else
    <a class="text-white bg-primary-600 hover:bg-primary-950 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-primary-950 focus:outline-none dark:focus:ring-pribg-950"
        href="">{{ $slot }}</a>
@endif
