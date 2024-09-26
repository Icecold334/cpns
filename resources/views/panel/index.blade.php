<x-body>
    <x-slot:title>{{ $title }}</x-slot>


    <div class="w-full  border border-gray-200 rounded-lg  px-4 py-3 shadow-xl bg-white rounded-b-lg dark:bg-gray-800">
        <label for="editor" class="sr-only">Publish post</label>
        <textarea id="editor"
            class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
            placeholder="Write an article..." required></textarea>
    </div>

</x-body>
