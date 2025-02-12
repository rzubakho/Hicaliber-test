import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue2 from '@vitejs/plugin-vue2';
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue2()
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            '@modules': '/resources/js/modules',
        },
    },
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        hmr: {
            host: 'localhost',
        },
    },
});
