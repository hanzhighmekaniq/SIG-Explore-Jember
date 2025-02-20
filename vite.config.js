import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    // server: {
    //     host: "0.0.0.0", // Buka server ke semua perangkat di jaringan
    //     hmr: {
    //         host: "10.10.180.18", // Ganti dengan IP Address laptop
    //     },
    // },
});
