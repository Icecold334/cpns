<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <form action="">
        <x-wysiwyg id="soal" class="mb-4" name="test" />
        @dump(Request('soal'))
        <input type="text" name="text">
        <button>submit</button>

    </form>
</x-body>
