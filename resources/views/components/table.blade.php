<div class="relative overflow-x-auto">
    <table
        {{ $attributes->merge(['class' => 'min-w-full  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400']) }}>
        {{ $slot }}
    </table>
</div>
