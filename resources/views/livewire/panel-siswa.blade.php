<div>
    <!-- Header -->
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Dashboard Siswa</h2>

    <div class="grid grid-cols-3 gap-10">
        <div class="xl:col-span-2">
            <div
                class="py-5 px-16 bg-gray-100 border-2 hover:shadow-2xl hover:bg-gray-50 transition duration-200 rounded-lg dark:bg-gray-800 ">

                <h5 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Statistik Nilai</h5>
                <canvas id="nilaiChart"></canvas>
            </div>
        </div>
        <div class="xl:col-span-1 grid grid-flow-row gap-6">
            <x-card-panel>
                <div class="flex-1">
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">Paket Ujian Tersedia</h5>
                    <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ $pakets->count() }}</p>
                </div>
                <div
                    class="w-14 h-14 flex bg-primary-100 items-center justify-center py-4 px-5 rounded-full text-primary-950 ">
                    <i class="fa-solid fa-rectangle-list"></i>
                </div>
            </x-card-panel>
            <x-card-panel>
                <div class="flex-1">
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">Paket Ujian Dikerjakan</h5>
                    <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        {{ $hasils->count() }}
                    </p>
                </div>
                <div
                    class="w-14 h-14 flex bg-success-100 items-center justify-center py-4 px-5 rounded-full text-success-950 ">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
            </x-card-panel>
            <x-card-panel>
                <div class="flex-1">
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">Paket Ujian Belum Dikerjakan</h5>
                    <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        {{ $pakets->count() - $hasils->count() }}
                    </p>
                </div>
                <div
                    class="w-14 h-14 flex bg-danger-100 items-center justify-center py-4 px-5 rounded-full text-danger-600 ">
                    <i class="fa-solid fa-circle-xmark"></i>
                </div>
            </x-card-panel>
        </div>
    </div>



</div>
<!-- Chart.js -->
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('nilaiChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($pakets->pluck('nama')->toArray()),
                datasets: [{
                    label: 'Nilai',
                    data: [65, 60, 90, 75, ],
                    borderColor: '{{ App\Models\Pengaturan::first()->primary }}',
                    fill: false,
                    tension: 0.2
                }]
            },
            options: {
                scales: {
                    x: {
                        display: false
                    },
                    y: {
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
    </script>
@endpush
