import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/js/flowbite.js',
        'resources/js/helper.js',
        'resources/js/alpine.js',
        'resources/js/index.js',
            ],
            refresh: true,
        }),
    ],
});

// 'resources/css/app.css',
// 'resources/js/app.js',
// 'resources/js/flowbite.js',
// 'resources/js/helper.js',
// 'resources/js/alpine.js',
// 'resources/js/index.js',