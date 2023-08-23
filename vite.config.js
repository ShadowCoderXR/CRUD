import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/soft-ui-dashboard.scss', 
                'resources/css/nucleo-icons.css',
                'resources/css/nucleo-svg.css',
            ],
            refresh: true,
        }),
    ],
});
