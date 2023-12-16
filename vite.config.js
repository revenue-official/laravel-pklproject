import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/home.css', 'resources/js/app.js', 'resources/js/home.js'],
            refresh: true,
        }),
        // postcss({
        //     plugins: [require('tailwindcss'), require('autoprefixer')],
        // }),
    ],
});
