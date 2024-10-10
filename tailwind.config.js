import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    safelist: [
        "cursor-pointer",
        "cursor-not-allowed",
        "cursor-default",
        {
            pattern:
                /bg-(primary|secondary|success|danger|warning|info|light|dark|red|green|gray)-(50|100|150|200|250|300|350|400|450|500|550|600|650|700|750|800|850|900|950)/,
        },
        {
            pattern:
                /text-(primary|secondary|success|danger|warning|info|light|dark|red|green|gray)-(50|100|150|200|250|300|350|400|450|500|550|600|650|700|750|800|850|900|950)/,
        },
        {
            pattern:
                /ring-(primary|secondary|success|danger|warning|info|light|dark|red|green|gray)-(50|100|150|200|250|300|350|400|450|500|550|600|650|700|750|800|850|900|950)/,
        },
        {
            pattern: /font-(normal|medium|semibold|bold|bolder)/,
        },
        {
            pattern: /text-(sm|lg|xl|2xl|3xl|5xl)/,
        },
        {
            pattern: /m-(auto|[0-9]{1,2}|[0-9]{1,2}rem)/,
        },
        {
            pattern: /p-(auto|[0-9]{1,2}|[0-9]{1,2}rem)/,
        },
        {
            pattern: /px-(auto|[0-9]{1,2}|[0-9]{1,2}rem)/,
        },
        {
            pattern: /py-(auto|[0-9]{1,2}|[0-9]{1,2}rem)/,
        },
        {
            pattern: /mx-(auto|[0-9]{1,2}|[0-9]{1,2}rem)/,
        },
        {
            pattern: /my-(auto|[0-9]{1,2}|[0-9]{1,2}rem)/,
        },
        {
            pattern: /max-w-(auto|[0-9]{1,2}|[0-9]{1,2}xl)/,
        },
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    50: "#ffffff", // Putih
                    100: "#e7d2e8",
                    200: "#c490c5",
                    300: "#b26fb4", // Titik seimbang
                    400: "#ad64ae",
                    500: "#a759a8",
                    600: "#a14ea3",
                    700: "#9b439d",
                    800: "#953897",
                    900: "#8f2d91",
                    950: "#8a228c", // Gelap
                },
                secondary: {
                    950: "#1a1d1f",
                    900: "#23272b",
                    800: "#2b2f33",
                    700: "#343a40",
                    600: "#495057",
                    500: "#6c757d",
                    400: "#adb5bd",
                    300: "#ced4da",
                    200: "#dee2e6",
                    100: "#e9ecef",
                    50: "#f8f9fa",
                },
                success: {
                    950: "#0f3d19",
                    900: "#146823",
                    800: "#19692c",
                    700: "#218838",
                    600: "#28a745",
                    500: "#34b852",
                    400: "#66d17b",
                    300: "#98e098",
                    200: "#c2f4c2",
                    100: "#daf6da",
                    50: "#eef8ee",
                },
                danger: {
                    950: "#4a0e1b",
                    900: "#721c24",
                    800: "#8e1b28",
                    700: "#a71d2a",
                    600: "#c82333",
                    500: "#dc3545",
                    400: "#e66172",
                    300: "#f199a3",
                    200: "#f9c8ce",
                    100: "#fce4e6",
                    50: "#fff5f5",
                },
                warning: {
                    950: "#665300",
                    900: "#806400",
                    800: "#997700",
                    700: "#b38400",
                    600: "#cca900",
                    500: "#ffc107",
                    400: "#ffd54c",
                    300: "#ffeb99",
                    200: "#ffeed4",
                    100: "#fffae6",
                    50: "#fffbe6",
                },
                info: {
                    950: "#084e68",
                    900: "#126782",
                    800: "#167e99",
                    700: "#1a95b2",
                    600: "#17a2b8",
                    500: "#33b5cc",
                    400: "#4ab6cc",
                    300: "#8cd3e0",
                    200: "#c3eaf3",
                    100: "#e7f7fb",
                    50: "#f3fbfd",
                },
                light: {
                    950: "#d1d3d4",
                    900: "#e2e6e9",
                    800: "#e9ecef",
                    700: "#edf0f2",
                    600: "#f1f3f4",
                    500: "#f8f9fa",
                    400: "#f9fafb",
                    300: "#fafbfc",
                    200: "#fcfcfc",
                    100: "#fdfdfd",
                    50: "#ffffff",
                },
                dark: {
                    950: "#0e0e0e",
                    900: "#16181b",
                    800: "#23272b",
                    700: "#343a40",
                    600: "#495057",
                    500: "#565e64",
                    400: "#868e96",
                    300: "#adb5bd",
                    200: "#c6c8ca",
                    100: "#d9dbdc",
                    50: "#ececec",
                },
            },
            fontFamily: {
                body: [
                    "Gilroy",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "system-ui",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
                sans: [
                    "Gilroy",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "system-ui",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
            },
        },
    },

    plugins: [
        require("flowbite-typography"),
        forms,
        require("flowbite/plugin")({
            wysiwyg: true,
            datatables: true,
        }),
    ],
};
