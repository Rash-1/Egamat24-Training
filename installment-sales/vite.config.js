import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/bootstrap.bundle.min.js',
                'resources/css/bootstrap.min.css',
                'resources/css/style.css',
            ],
            refresh: true,
        }),
    ],
});
