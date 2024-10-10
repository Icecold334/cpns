import "./bootstrap";
import "flowbite";
import $ from "jquery";
window.jQuery = window.$ = $;
import Swal from "sweetalert2";
window.Swal = Swal;
import Alpine from "alpinejs";
window.Alpine = Alpine;
import "trix/dist/trix.css";
import "trix";
import { DataTable } from "simple-datatables";
window.DataTable = DataTable;
Alpine.start();

const label = {
    placeholder: "Cari Data",
    perPage: "Tampilkan data",
    noRows: "Tabel kosong",
    info: "Menampilkan {start} sampai {end} dari {rows} data",
    infoFiltered: "(filtered from {rowsTotal} total entries)",
    loading: "Memuat...",
    noResults: "Data tidak ditemukan",
    next: ">",
    previous: "<",
    first: "<<",
    last: ">>",
};
const render = (_data, table, type) => {
    if (type === "print") {
        return table;
    }
    const tHead = table.childNodes[0];
    tHead.childNodes[0].attributes = {
        class: "text-gray-950 text-sm text-center bg-gray-300",
    };
    table.childNodes[1].attributes = {
        class: "text-gray-950 font-semibold",
    };
    return table;
};

window.table = function (selector) {
    return new DataTable(selector, {
        perPage: 25,
        searchable: true,
        sortable: true,
        labels: label,
        tableRender: render,
    });
};
