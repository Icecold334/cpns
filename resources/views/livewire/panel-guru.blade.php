<div>
    <!-- Header -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-4">
        <x-card-panel class="hover:scale-[1.05]">
            <div class="flex-1">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Paket Ujian Dibuat</h5>
                <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    {{ $pakets->where('user_id', Auth::user()->id)->count() }}
                </p>
            </div>
            <div
                class="w-14 transition-all h-14 flex bg-primary-100 items-center justify-center py-4 px-5 rounded-full text-primary-950 ">
                <i class="fa-solid fa-rectangle-list"></i>
            </div>
        </x-card-panel>
        <x-card-panel class="hover:scale-[1.05]">
            <div class="flex-1">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Jumlah Soal Dibuat</h5>
                <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    {{ $soals->count() }}
                </p>
            </div>
            <div class="w-14 h-14 flex bg-info-100 items-center justify-center py-4 px-5 rounded-full text-info-950 ">
                <i class="fa-solid fa-pen-ruler"></i>
            </div>
        </x-card-panel>
        <x-card-panel class="hover:scale-[1.05]">
            <div class="flex-1">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Paket Ujian Aktif</h5>
                <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    {{ $pakets->where('user_id', Auth::user()->id)->where('status', true)->count() }}
                </p>
            </div>
            <div
                class="w-14 h-14 flex bg-success-100 items-center justify-center py-4 px-5 rounded-full text-success-600 ">
                <i class="fa-solid fa-file-circle-check"></i>
            </div>
        </x-card-panel>
        <x-card-panel class="hover:scale-[1.05]">
            <div class="flex-1">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Paket Ujian Tidak Aktif</h5>
                <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    {{ $pakets->where('user_id', Auth::user()->id)->where('status', false)->count() }}
                </p>
            </div>
            <div
                class="w-14 h-14 flex bg-secondary-100 items-center justify-center py-4 px-5 rounded-full text-secondary-600 ">
                <i class="fa-solid fa-file-circle-xmark"></i>
            </div>
        </x-card-panel>
    </div>
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <div
            class="hover:scale-[1.02] p-5  mb-4 xl:mb-0 bg-gray-100 border-2 hover:shadow-2xl hover:bg-gray-50 transition duration-200 rounded-lg dark:bg-gray-800 ">
            <h5 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Rata-Rata Nilai / Kategori
            </h5>
            @if (
                $kategoris->mapWithKeys(function ($item) {
                        return [$item->id => floor($item->hasil->avg('nilai'))];
                    })->values()->sum() > 0)
                <div class=" flex items-center justify-center h-64">
                    <canvas id="mean"
                        class="mx-16 md:mx-30 lg:mx-40 flex items-center justify-center h-64"></canvas>
                </div>
            @else
                <div class="text-2xl font-bold flex items-center justify-center h-64">Belum Ada Data</div>
            @endif
        </div>
        <div
            class=" hover:scale-[1.02] p-5  bg-gray-100 border-2 hover:shadow-2xl hover:bg-gray-50 transition duration-200 rounded-lg dark:bg-gray-800 ">
            <h5 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Paket Ujian Paling Disukai</h5>
            <div class=" flex items-center justify-center h-64">
                <canvas id="mostLike"></canvas>
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="module">
        $(document).ready(function() {


            function randomColor() {
                const letters = '0123456789ABCDEF';
                let color = '#';
                for (let i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
            if ({!! $kategoris->mapWithKeys(function ($item) {
                    return [$item->id => floor($item->hasil->avg('nilai'))];
                })->values()->sum() > 0 !!}) {
                const ctx1 = document.getElementById('mean').getContext('2d');
                const chart1 = new Chart(ctx1, {
                    type: 'pie',
                    data: {
                        labels: @json($kategoris->pluck('nama')->toArray()),
                        datasets: [{
                            label: 'Rata-rata',
                            data: @json(
                                $kategoris->mapWithKeys(function ($item) {
                                        return [$item->id => floor($item->hasil->avg('nilai'))];
                                    })->values()->toArray()),
                            // backgroundColor: '{{ App\Models\Pengaturan::first()->primary }}',
                            fill: false,
                            tension: 0.1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                display: false
                            },
                            y: {
                                display: false,
                                // min: -5, // Batas minimum tampilan
                                max: 100, // Batas maksimum tampilan
                                ticks: {
                                    stepSize: 25
                                },
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                display: false // Menyembunyikan legend
                            }
                        }
                    }
                });
            }
            // Data untuk grafik
            const labelsBar = @json(array_values(
                    $pakets->filter(function ($item) {
                            return $item->result->count() > 0;
                        })->map(function ($item) {
                            return $item->nama;
                        })->toArray()));
            const dataBar = @json(array_values(
                    $pakets->filter(function ($item) {
                            return $item->result->count() > 0;
                        })->map(function ($item) {
                            return $item->result->count();
                        })->toArray()));

            // Membuat warna untuk setiap batang
            const backgroundColorsBar = dataBar.map(() => randomColor());
            const ctx2 = document.getElementById('mostLike').getContext('2d');
            const chart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: labelsBar,
                    datasets: [{
                        label: 'Jumlah dikerjakan',
                        data: dataBar,
                        backgroundColor: backgroundColorsBar,
                        fill: false,
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            // display: false
                        },
                        y: {
                            // display: false,
                            // min: -5, // Batas minimum tampilan
                            // max: 100, // Batas maksimum tampilan
                            ticks: {
                                stepSize: 1
                            },
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false // Menyembunyikan legend
                        }
                    }
                }
            });
        });
    </script>
@endpush
