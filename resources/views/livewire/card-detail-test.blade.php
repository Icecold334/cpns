<x-table class="w-full text-gray-800">
    <tr>
        <td class="font-bold px-6 md:px-0 xl:px-8 text-center">Jumlah Soal</td>
        <td class="font-bold px-6 md:px-0 xl:px-8 text-center ">Terjawab</td>
        <td class="font-bold px-6 md:px-0 xl:px-8 text-center ">Belum Terjawab</td>

    </tr>
    <tr>
        <td class="font-bold px-6 md:px-0 xl:px-8 text-center">{{ $total }}</td>
        <td class="font-bold px-6 md:px-0 xl:px-8 text-center text-green-600">{{ $terjawab }}</td>
        <td class="font-bold px-6 md:px-0 xl:px-8 text-center text-red-600">{{ $belum }}</td>
    </tr>
</x-table>
