<div class="w-full my-3">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <trix-editor input="content-{{ $id }}" id="trix-{{ $id }}" required class="format"
        style="max-width: 100%"></trix-editor>
    <input id="content-{{ $id }}" type="hidden" {{ $attributes }}>
    <p id="error-message{{ $id }}" style="color: red; display: none;">Konten tidak boleh kosong.</p>
</div>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            var editor = document.getElementById("trix-{{ $id }}");
            var contentInput = document.getElementById("content-{{ $id }}");
            var errorMessage = document.getElementById("error-message{{ $id }}");

            editor.addEventListener("trix-change", (event) => {
                const document = event.target.editor.getDocument();
                // console.log(document);

                // contentInput.value = document.toString().trim(); // Perbarui input terkait

                // Menampilkan atau menyembunyikan pesan error
                if (contentInput.value !== "") {
                    errorMessage.style.display = "none";
                } else {
                    errorMessage.style.display = "block";
                }

                // Memicu event input untuk Livewire
                contentInput.dispatchEvent(new Event('input'));
            });

            // Penanganan unggahan file
            document.addEventListener("trix-attachment-add", function(event) {
                var attachment = event.attachment;

                if (attachment.file) {
                    var formData = new FormData();
                    formData.append('file', attachment.file);

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
                            attachment.setAttributes({
                                url: data.url // URL permanen dari server
                            });
                        })
                        .catch(error => console.error('Upload error:', error));
                }
            });

            document.addEventListener("trix-attachment-remove", function(event) {
                var attachment = event.attachment;
                var fileUrl = attachment.getURL(); // Dapatkan URL file

                if (fileUrl) {
                    fetch('/trix-delete', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content
                            },
                            body: JSON.stringify({
                                url: fileUrl
                            })
                        })
                        .then(response => response.json())
                        .then(data => {})
                        .catch(error => console.error('Error:', error));
                }
            });
        });
    </script>
@endpush
