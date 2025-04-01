import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: "oklch(0.986 0.031 120.757)",
                    100: "oklch(0.967 0.067 122.328)",
                    200: "oklch(0.938 0.127 124.321)",
                    300: "oklch(0.897 0.196 126.665)",
                    400: "oklch(0.841 0.238 128.85)",
                    500: "oklch(0.768 0.233 130.85)",
                    600: "oklch(0.648 0.2 131.684)",
                    700: "oklch(0.532 0.157 131.589)",
                    800: "oklch(0.453 0.124 130.933)",
                    900: "oklch(0.405 0.101 131.063)"
                },
                foreground: {
                    DEFAULT: "oklch(0.5 0.0 0.0)"
                },
            },
        },
    },

    plugins: [forms],
};
