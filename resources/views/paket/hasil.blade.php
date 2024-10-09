<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex items-center space-x-4 mb-3 text-3xl sm:text-4xl md:text-5xl">
        <a href="/paket" class="text-primary-600 hover:text-primary-950 transition duration-200">

            <i class="fa-solid fa-circle-chevron-left"></i>
        </a>
        <div class="font-semibold text-slate-800"> Hasil
            {{ $paket->nama }}
        </div>
    </div>

    <div class="w-full bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 mb-5">
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-200 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
            <div
                class="inline-block text-xl font-semibold p-4 text-gray-900 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">
                Informasi Ujian</div>
        </ul>
        <div>
            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800">
                <x-table>
                    <tr class="text-xl font-bold text-gray-900">
                        <td style="width: 20%">Nama Paket Ujian</td>
                        <td>{{ $paket->nama }}</td>
                    </tr>
                    <tr class="text-xl font-bold text-gray-900">
                        <td style="width: 20%">Jumlah Soal</td>
                        <td>{{ $paket->soal->count() }}</td>
                    </tr>
                </x-table>
            </div>
        </div>
    </div>
    <div class="w-full bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 mb-5">
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-200 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
            <div
                class="inline-block text-xl font-semibold p-4 text-gray-900 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">
                Informasi Peserta</div>
        </ul>
        <div>
            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800">
                <x-table>




                    <tr class="text-xl font-bold text-gray-900">
                        <td style="width: 20%">Nama Peserta</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr class="text-xl font-bold text-gray-900">
                        <td style="width: 20%">Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @foreach ($hasils as $hasil)
                        <tr class="text-xl font-bold text-gray-900">
                            <td style="width: 20%">Nilai {{ $hasil->kategori->nama }}</td>
                            <td>{{ $hasil->nilai }}</td>
                        </tr>
                    @endforeach
                    <tr class="text-xl font-bold text-gray-900">
                        <td style="width: 20%">Nilai Total</td>
                        <td>{{ $total }}</td>
                    </tr>
                </x-table>
            </div>
        </div>
    </div>
</x-body>
