import "./bootstrap";
import "flowbite";
import $ from "jquery";
window.jQuery = window.$ = $;
import Swal from "sweetalert2";
window.Swal = Swal;
import Alpine from "alpinejs";
window.Alpine = Alpine;
import { DataTable } from "simple-datatables";
window.DataTable = DataTable;
Alpine.start();

window.table = function (selector) {
    return new DataTable(selector, {
        perPage: 25,
        searchable: true,
        sortable: true,
        tableRender: (_data, table, type) => {
            if (type === "print") {
                return table;
            }

            const tHead = table.childNodes[0];

            const filterHeaders = {
                nodeName: "TR",
                attributes: {
                    class: "search-filtering-row text-gray-950 bg-gray-300 text-center",
                },
                childNodes: Array.from(tHead.childNodes[0].childNodes).map(
                    (_th, index, array) => {
                        // Memeriksa apakah ini adalah elemen terakhir
                        if (index === array.length - 1 || index === 0) {
                            return {
                                nodeName: "TH",
                                childNodes: [],
                                attributes: {
                                    class: "no-sort ",
                                },
                            };
                        } else {
                            return {
                                nodeName: "TH",
                                childNodes: [
                                    {
                                        nodeName: "INPUT",
                                        attributes: {
                                            class: "datatable-input w-[60%] hidden xl:inline text-center",
                                            type: "search",
                                            placeholder:
                                                "Cari " +
                                                _th.childNodes[0].childNodes[0]
                                                    .data,
                                            "data-columns": "[" + index + "]",
                                        },
                                    },
                                ],
                            };
                        }
                    }
                ),
            };
            tHead.childNodes.push(filterHeaders);
            tHead.childNodes[0].attributes = {
                class: "text-gray-950 text-sm text-center bg-gray-300",
            };
            table.childNodes[1].attributes = {
                class: "text-gray-950 font-semibold",
            };
            return table;
        },
        labels: {
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
        },
    });
};
