import { defineConfig } from 'vite';

export default defineConfig({
    build: {
        manifest: true,
        rollupOptions: {
            input: ['./src/js/app.js'],
            output: {
                entryFileNames: 'comments.js',
                assetFileNames: 'comments.[ext]'
            }
        },
        assetsDir: '',
        outDir: 'dist'
    }
});
