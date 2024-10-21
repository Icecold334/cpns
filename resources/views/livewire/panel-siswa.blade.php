<div class="container mx-auto ">
    <!-- Header -->
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Dashboard Siswa</h2>

    <!-- Grid Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card 1: Total Paket Soal -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex-1">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Total Paket Soal</h5>
                <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">10</p>
            </div>
            <div class="p-3 bg-blue-100 rounded-full">
                <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 7H7v6h6V7z" />
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11H9v2h2V7zM9 9v4h2V9H9z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <!-- Card 2: Ujian Selesai -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex-1">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Ujian Selesai</h5>
                <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">7</p>
            </div>
            <div class="p-3 bg-green-100 rounded-full">
                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3-11l-4 4-1-1-1.5 1.5 2.5 2.5 5.5-5.5L13 7z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <!-- Card 3: Ujian Berlangsung -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex-1">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Ujian Berlangsung</h5>
                <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">1</p>
            </div>
            <div class="p-3 bg-yellow-100 rounded-full">
                <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10A8 8 0 110 10a8 8 0 0118 0zm-8-4v4H6v2h6V6h-2z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <!-- Card 4: Total Nilai -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex-1">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Total Nilai</h5>
                <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">500</p>
            </div>
            <div class="p-3 bg-red-100 rounded-full">
                <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10A8 8 0 110 10a8 8 0 0118 0zm-8-4v4H6v2h6V6h-2z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2">
        <!-- Chart Section -->
        <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
            <h5 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Statistik Nilai</h5>
            <canvas id="nilaiChart"></canvas>
        </div>
    </div>


</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('nilaiChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Paket A', 'Paket B', 'Paket C', 'Paket D'],
            datasets: [{
                label: 'Nilai',
                data: [65, 60, 90, 75, ],
                borderColor: 'rgb(75, 192, 192)',
                fill: false,
                tension: 0.2
            }]
        },
        options: {
            scales: {
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
