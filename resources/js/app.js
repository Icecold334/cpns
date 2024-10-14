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
import { Editor } from "https://esm.sh/@tiptap/core@2.6.6";
import StarterKit from "https://esm.sh/@tiptap/starter-kit@2.6.6";
import Highlight from "https://esm.sh/@tiptap/extension-highlight@2.6.6";
import Underline from "https://esm.sh/@tiptap/extension-underline@2.6.6";
import Link from "https://esm.sh/@tiptap/extension-link@2.6.6";
import TextAlign from "https://esm.sh/@tiptap/extension-text-align@2.6.6";
import Image from "https://esm.sh/@tiptap/extension-image@2.6.6";
import YouTube from "https://esm.sh/@tiptap/extension-youtube@2.6.6";
import TextStyle from "https://esm.sh/@tiptap/extension-text-style@2.6.6";
import FontFamily from "https://esm.sh/@tiptap/extension-font-family@2.6.6";

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

window.editor = function (elementId, content) {
    window.addEventListener("load", function () {
        const FontSizeTextStyle = TextStyle.extend({
            addAttributes() {
                return {
                    fontSize: {
                        default: null,
                        parseHTML: (element) => element.style.fontSize,
                        renderHTML: (attributes) => {
                            if (!attributes.fontSize) {
                                return {};
                            }
                            return {
                                style: "font-size: " + attributes.fontSize,
                            };
                        },
                    },
                };
            },
        });
        const editor = new Editor({
            element: document.querySelector(`#${elementId}`),
            extensions: [
                StarterKit,
                Highlight,
                Underline,
                Link.configure({
                    openOnClick: false,
                    autolink: true,
                    defaultProtocol: "https",
                }),
                TextAlign.configure({
                    types: ["heading", "paragraph"],
                }),
                Image,
                YouTube,
                FontSizeTextStyle,
                FontFamily,
            ],
            content: content,
            editorProps: {
                attributes: {
                    class: "format lg:format-lg dark:format-invert focus:outline-none format-blue max-w-none",
                },
            },
        });

        document
            .getElementById(elementId + "toggleBoldButton")
            .addEventListener("click", () =>
                editor.chain().focus().toggleBold().run()
            );
        document
            .getElementById(elementId + "toggleItalicButton")
            .addEventListener("click", () =>
                editor.chain().focus().toggleItalic().run()
            );
        document
            .getElementById(elementId + "toggleUnderlineButton")
            .addEventListener("click", () =>
                editor.chain().focus().toggleUnderline().run()
            );
        document
            .getElementById(elementId + "toggleStrikeButton")
            .addEventListener("click", () =>
                editor.chain().focus().toggleStrike().run()
            );
        document
            .getElementById(elementId + "toggleLinkButton")
            .addEventListener("click", () => {
                const url = window.prompt(
                    "Enter image URL:",
                    "https://flowbite.com"
                );
                editor.chain().focus().toggleLink({ href: url }).run();
            });
        document
            .getElementById(elementId + "removeLinkButton")
            .addEventListener("click", () => {
                editor.chain().focus().unsetLink().run();
            });
        document
            .getElementById(elementId + "toggleCodeButton")
            .addEventListener("click", () => {
                editor.chain().focus().toggleCode().run();
            });

        document
            .getElementById(elementId + "toggleLeftAlignButton")
            .addEventListener("click", () => {
                editor.chain().focus().setTextAlign("left").run();
            });
        document
            .getElementById(elementId + "toggleCenterAlignButton")
            .addEventListener("click", () => {
                editor.chain().focus().setTextAlign("center").run();
            });
        document
            .getElementById(elementId + "toggleRightAlignButton")
            .addEventListener("click", () => {
                editor.chain().focus().setTextAlign("right").run();
            });
        document
            .getElementById(elementId + "toggleListButton")
            .addEventListener("click", () => {
                editor.chain().focus().toggleBulletList().run();
            });
        document
            .getElementById(elementId + "toggleOrderedListButton")
            .addEventListener("click", () => {
                editor.chain().focus().toggleOrderedList().run();
            });
        document
            .getElementById(elementId + "toggleBlockquoteButton")
            .addEventListener("click", () => {
                editor.chain().focus().toggleBlockquote().run();
            });

        const addImageButton = document.getElementById(
            elementId + "addImageButton"
        );
        const imageInput = document.getElementById(elementId + "imageInput");

        // Saat tombol "Upload Image" diklik, buka file input untuk memilih gambar
        addImageButton.addEventListener("click", () => {
            imageInput.click();
        });

        // Saat gambar dipilih, tampilkan di editor
        imageInput.addEventListener("change", (event) => {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                // Setelah file dibaca, tambahkan ke editor sebagai gambar
                reader.onload = () => {
                    const url = reader.result; // URL data dari file yang dipilih
                    editor.chain().focus().setImage({ src: url }).run();
                };

                reader.readAsDataURL(file); // Baca file sebagai data URL
            }
        });

        // typography dropdown
        const typographyDropdown = FlowbiteInstances.getInstance(
            "Dropdown",
            elementId + "typographyDropdown"
        );

        document
            .getElementById(elementId + "toggleParagraphButton")
            .addEventListener("click", () => {
                editor.chain().focus().setParagraph().run();
                typographyDropdown.hide();
            });

        document.querySelectorAll("[data-heading-level]").forEach((button) => {
            button.addEventListener("click", () => {
                const level = button.getAttribute("data-heading-level");
                editor
                    .chain()
                    .focus()
                    .toggleHeading({ level: parseInt(level) })
                    .run();
                typographyDropdown.hide();
            });
        });

        const textSizeDropdown = FlowbiteInstances.getInstance(
            "Dropdown",
            elementId + "textSizeDropdown"
        );

        // Loop through all elements with the data-text-size attribute
        document.querySelectorAll("[data-text-size]").forEach((button) => {
            button.addEventListener("click", () => {
                const fontSize = button.getAttribute("data-text-size");

                // Apply the selected font size via pixels using the TipTap editor chain
                editor.chain().focus().setMark("textStyle", { fontSize }).run();

                // Hide the dropdown after selection
                textSizeDropdown.hide();
            });
        });

        const fontFamilyDropdown = FlowbiteInstances.getInstance(
            "Dropdown",
            elementId + "fontFamilyDropdown"
        );

        // Loop through all elements with the data-font-family attribute
        document.querySelectorAll("[data-font-family]").forEach((button) => {
            button.addEventListener("click", () => {
                const fontFamily = button.getAttribute("data-font-family");

                // Apply the selected font size via pixels using the TipTap editor chain
                editor.chain().focus().setFontFamily(fontFamily).run();

                // Hide the dropdown after selection
                fontFamilyDropdown.hide();
            });
        });

        return editor;
    });
};
