import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            // 👇 tambahkan assetUrl ke domain HTTPS kamu
            assetUrl: 'https://skripsiku.up.railway.app',
        }),
    ],
})
