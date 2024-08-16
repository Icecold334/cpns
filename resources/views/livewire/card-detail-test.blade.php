<div class="card-body d-flex justify-content-center align-items-center">
    <div class="d-flex justify-content-center">
        <table class="table table-borderless table-responsive m-0">
            <tr>
                <td class="font-weight-bold text-center">Jumlah Soal</td>
                <td class="font-weight-bold text-center ">Terjawab</td>
                <td class="font-weight-bold text-center ">Belum Terjawab</td>

            </tr>
            <tr>
                <td class="font-weight-bold text-center">{{ $total }}</td>
                <td class="font-weight-bold text-center text-success">{{ $terjawab }}</td>
                <td class="font-weight-bold text-center text-danger">{{ $belum }}</td>
            </tr>
        </table>
    </div>
</div>
