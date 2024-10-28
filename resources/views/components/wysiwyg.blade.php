<div class="w-full my-3">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input id="content" type="hidden" name="content">
    <trix-editor input="content" id="trix-content"></trix-editor>
</div>
<script>
    (function() {
        var HOST = "/trix-upload"

        addEventListener("trix-attachment-add", function(event) {
            if (event.attachment.file) {
                uploadFileAttachment(event.attachment)
            }
        })

        function uploadFileAttachment(attachment) {
            uploadFile(attachment.file, setProgress, setAttributes)

            function setProgress(progress) {
                attachment.setUploadProgress(progress)
            }

            function setAttributes(attributes) {
                attachment.setAttributes(attributes)
            }
        }

        function uploadFile(file, progressCallback, successCallback) {
            var key = createStorageKey(file)
            var formData = createFormData(key, file)
            var xhr = new XMLHttpRequest()

            // Ambil CSRF token dari meta tag
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            xhr.open("POST", HOST, true)

            // Set CSRF token pada header
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken)

            xhr.upload.addEventListener("progress", function(event) {
                var progress = event.loaded / event.total * 100
                progressCallback(progress)
            })

            xhr.addEventListener("load", function(event) {

                if (xhr.status == 204) {
                    var attributes = {
                        url: HOST + key,
                        href: HOST + key + "?content-disposition=attachment"
                    }
                    successCallback(attributes)
                }
            })

            xhr.send(formData)
        }

        function createStorageKey(file) {
            var date = new Date()
            var day = date.toISOString().slice(0, 10)
            var name = date.getTime() + "-" + file.name
            return ["tmp", day, name].join("/")
        }

        function createFormData(key, file) {
            var data = new FormData()
            data.append("key", key)
            data.append("Content-Type", file.type)
            data.append("file", file)
            return data
        }
    })();
</script>
