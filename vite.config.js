import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.js",
                "public/assets/js/tinymce.js",
                "public/assets/js/select-cat.js",
            ],
            refresh: true,
        }),
    ],
    server:{
        host: '192.168.18.31',
    },
});
