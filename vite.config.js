import { defineConfig } from 'vite';
import jigsaw from '@tighten/jigsaw-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        jigsaw({
            input: [
                'source/_assets/js/main.js',
                'source/_assets/css/main.css'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
