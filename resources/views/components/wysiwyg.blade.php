<div class="w-full my-3">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <trix-editor input="content-{{ $id }}" id="trix-{{ $id }}" required></trix-editor>
    <input id="content-{{ $id }}" type="text" {{ $attributes }}>
    <p id="error-message{{ $id }}" style="color: red; display: none;">Konten tidak boleh kosong.</p>
</div>
@push('scripts')
    <script>
        var editor{{ $id }} = document.getElementById("trix-{{ $id }}");
        var contentInput{{ $id }} = document.getElementById("content-{{ $id }}");
        var errorMessage{{ $id }} = document.getElementById("error-message{{ $id }}");
        editor{{ $id }}.addEventListener("trix-change", () => {
            // console.log(editor{{ $id }}.editor.getDocument().toString()
            //     .trim());

            // contentInput{{ $id }}.value = editor{{ $id }}.editor.getDocument().toString()
            //     .trim();
            if (contentInput{{ $id }}.value !== "") {
                errorMessage{{ $id }}.style.display = "none";
            } else {
                errorMessage{{ $id }}.style.display = "block";

            }
        });

        (function() {
            var HOST = "/trix-upload"

            addEventListener('trix-change', function(e) {
                // Ambil konten Trix Editor
                var content = event.target.innerHTML;

                // Simpan konten ke input hidden (agar Livewire menangkapnya di wire:model)
                document.getElementById("content-{{ $id }}").value = content;
                document.getElementById('content-{{ $id }}').dispatchEvent(new Event('input'));
            })
            document.addEventListener("trix-attachment-remove", function(event) {
                var attachment = event.attachment;
                var fileUrl = attachment.getURL(); // Dapatkan URL file

                if (fileUrl) {
                    // Kirim permintaan untuk menghapus file
                    removeFileFromServer(fileUrl);
                }
            });

            function removeFileFromServer(fileUrl) {
                fetch('/trix-delete', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            url: fileUrl
                        })
                    })
                    .then(response => response.json())
                    .then(data => {})
                    .catch(error => console.error('Error:', error));
            }


            addEventListener("trix-attachment-add", function(event) {
                if (event.attachment.file) {
                    var file = event.attachment.file;
                    var formData = new FormData();
                    formData.append('file', file);

                    // Ganti URL ini dengan URL endpoint server untuk unggahan
                    fetch('/trix-upload', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Set URL permanen dari server
                            event.attachment.setAttributes({
                                url: data.url // URL permanen dari server
                            });
                        })
                        .catch(error => console.error('Upload error:', error));
                }
            })
        })();
    </script>
@endpush
