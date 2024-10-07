<x-body>
    <x-slot:title>{{ $title }}</x-slot>


    <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
            <div
                class="inline-block text-xl font-semibold p-4 text-gray-900 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">
                Informasi Ujian</div>
        </ul>
        <div>
            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800">
                <x-table>
                    <tr class="text-xl font-bold text-gray-900">
                        <td style="width: 20%">Nama Paket</td>
                        <td>{{ $paket->nama }}</td>
                    </tr>
                    <tr class="text-xl font-bold text-gray-900">
                        <td style="width: 20%">Jumlah Soal</td>
                        <td>{{ $paket->soal->count() }}</td>
                    </tr>
                    <tr class="text-xl font-bold text-gray-900">
                        <td style="width: 20%">Durasi {{ $paket->flat ? '' : '/ Soal' }}</td>
                        <td> {{ $paket->flat ? floor($paket->durasi / 60) : $paket->durasi }}
                            {{ $paket->flat ? 'Menit' : 'Detik' }}</td>
                    </tr>
                </x-table>
            </div>
        </div>
    </div>
    <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
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

                </x-table>
            </div>
        </div>
    </div>
    <div class="flex">
        {{-- <a href="/paket/test/{{ $paket->uuid }}/play" class="btn btn-primary">Mulai Ujian</a>
        <a href="/paket" class="btn btn-primary">Batal Ujian</a> --}}
        <x-button :button="false" href="/paket/test/{{ $paket->uuid }}/play">Mulai Ujian</x-button>
        <x-button :button="false" href="/paket">Batal Ujian</x-button>
    </div>


</x-body>
