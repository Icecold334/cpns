<x-body>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1>Pengaturan Aplikasi</h1>
    <div class="row">
        <div class="col-xl-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <livewire:setting-form />
                </div>
            </div>
        </div>
    </div>
</x-body>
