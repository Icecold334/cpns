<x-table class="w-full">
    <tr>
        <td class="font-bold text-center">Jumlah Soal</td>
        <td class="font-bold text-center ">Terjawab</td>
        <td class="font-bold text-center ">Belum Terjawab</td>

    </tr>
    <tr>
        <td class="font-bold text-center">{{ $total }}</td>
        <td class="font-bold text-center text-green-600">{{ $terjawab }}</td>
        <td class="font-bold text-center text-red-600">{{ $belum }}</td>
    </tr>
</x-table>
