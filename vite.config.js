import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/js/test.js',
        'resources/js/flowbite.js',
        'resources/js/helper.js',
        'resources/js/alpine.js',
        'resources/js/index.js',
        'resources/js/fileUpload.js',
        'resources/views/newStyle/css/nordic.css',
        'resources/views/coffee/css/coffee.css'
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