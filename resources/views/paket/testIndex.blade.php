<x-body>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="w-full bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 mb-5">
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-200 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
            <div
                class="inline-block text-xl font-bold p-4 text-gray-900 rounded-ss-lg  dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">
                Informasi Peserta</div>
        </ul>
        <div>
            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800">
                <x-table>
                    <tr class="text-xl font-medium text-gray-900">
                        <td style="width: 30%">Nama Peserta</td>
                        <td>{{ $user->name }}</td>
                    </tr>

                    <tr class="text-xl font-medium text-gray-900">
                        <td style="width: 30%">Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>

                </x-table>
            </div>
        </div>
    </div>
    <div class="w-full bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 mb-5">
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-200 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
            <div
                class="inline-block text-xl font-bold p-4 text-gray-900 rounded-ss-lg  dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">
                Informasi Ujian</div>
        </ul>
        <div>
            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800">
                <x-table>
                    <tr class="text-xl font-medium text-gray-900">
                        <td style="width: 30%">Nama Paket</td>
                        <td>{{ $paket->nama }}</td>
                    </tr>

                    <tr class="text-xl font-medium text-gray-900">
                        <td style="width: 30%">Durasi {{ $paket->flat ? '' : '/ Soal' }}</td>
                        <td> {{ $paket->flat ? floor($paket->durasi / 60) : $paket->durasi }}
                            {{ $paket->flat ? 'Menit' : 'Detik' }}</td>
                    </tr>
                    <tr class="text-xl font-medium text-gray-900">
                        <td style="width: 30%">Kategori Paket</td>
                        <td>{{ $paket->base->nama }}</td>
                    </tr>
                    <tr class="text-xl font-medium text-gray-900">
                        <td style="width: 30%">Jumlah Soal</td>
                        <td>{{ $paket->soal->count() }}</td>
                    </tr>
                    @foreach ($paket->base->kategori as $kategori)
                        <tr class="text-xl font-medium text-gray-900">
                            <td style="width: 30%">Jumlah Soal {{ $kategori->nama }}</td>
                            <td> {{ $kategori->soal->where('paket_id', $paket->id)->count() }} </td>
                        </tr>
                    @endforeach
                </x-table>
            </div>
        </div>
    </div>

    <div class="flex">
        {{-- <a href="/paket/test/{{ $paket->uuid }}/play" class="btn btn-primary">Mulai Ujian</a>
        <a href="/paket" class="btn btn-primary">Batal Ujian</a> --}}
        <x-button :button="false" class="me-3" href="/paket/test/{{ $paket->uuid }}/play">Mulai Ujian</x-button>
        <x-button :button="false" href="/paket">Batal Ujian</x-button>
    </div>


</x-body>
