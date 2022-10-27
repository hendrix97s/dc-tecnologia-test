import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
              'resources/css/app.css', 
              'resources/css/login.css',
              'resources/css/menu.css',
              'resources/css/product.css',
              'resources/css/sale.css',
              'resources/js/product.js',
              'resources/js/sale.js',
              'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
