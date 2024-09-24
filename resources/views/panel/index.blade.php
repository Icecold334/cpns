<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    {{-- input --}}
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
    <input type="email"
        id="email"class="bg-gray-50 transition shadow-md duration-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

    {{-- select --}}
    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your
        country</label>
    <select id="countries"
        class="bg-gray-50 border shadow-md transition duration-200 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

        <option>United States</option>
        <option>Canada</option>
        <option>France</option>
        <option>Germany</option>
    </select>
    {{-- checkbox --}}
    <div class="flex items-center mb-4">
        <input id="checkbox-2" type="checkbox" value=""
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I want to get
            promotional offers</label>
    </div>
    {{-- radio --}}
    <div class="flex items-center mb-4">
        <input id="country-option-1" type="radio" name="countries" value="USA"
            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"
            checked>
        <label for="country-option-1" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
            United States
        </label>
    </div>
    {{-- file --}}
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
    <input
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        aria-describedby="user_avatar_help" id="user_avatar" type="file">
</x-body>
