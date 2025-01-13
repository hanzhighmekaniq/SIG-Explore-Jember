/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        container: {
            center: true, // Memastikan kontainer tetap terpusat
            // padding: {
            //     DEFAULT: "1rem",
            //     sm: "2rem",
            //     lg: "4rem",
            //     xl: "6rem",
            //     "2xl": "8rem", // Jaga jarak padding, tapi fokus ke max-width di bawah
            // },
        },
        extend: {
            animation: {
                glow: "glow-animation 1.5s ease-in-out infinite",
            },
            keyframes: {
                "glow-animation": {
                    "0%": {
                        boxShadow: "0 0 5px rgba(255, 255, 255, 0.5)",
                    },
                    "50%": {
                        boxShadow: "0 0 20px rgba(255, 255, 255, 1)",
                    },
                    "100%": {
                        boxShadow: "0 0 5px rgba(255, 255, 255, 0.5)",
                    },
                },
            },
            screens: {
                sm: "640px",
                md: "868px",
                lg: "1024px",
                xl: "1280px",
                "2xl": "1536px",
                custom: "878px",
            },

            dropShadow: {
                "3xl": "0 35px 35px rgba(0, 0, 0, 0.25)",
                "4xl": [
                    "0 35px 35px rgba(0, 0, 0, 0.25)",
                    "0 45px 65px rgba(0, 0, 0, 0.15)",
                ],
            },
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
