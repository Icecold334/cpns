<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex justify-between mb-10">
        <div class="flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl">
            <a href="{{ route('siswa.index') }}" class="text-primary-600 hover:text-primary-950 transition duration-200">
                <i class="fa-solid fa-circle-chevron-left"></i>
            </a>
            <div class="font-semibold text-slate-800">{{ $title }}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <livewire:siswa-form :id="$user->id" :name="$user->name" :gender="$user->gender" :email="$user->email"
                        :oldEmail="$user->email" />
                </div>
            </div>
        </div>
    </div>
</x-body>
