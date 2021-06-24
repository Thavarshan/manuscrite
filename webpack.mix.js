const mix = require('laravel-mix');
const path = require('path');

mix.js('resources/js/app.js', 'public/js')
    .vue({ version: 3 })
    .sass('resources/sass/app.scss', 'css/app.css')
    .options({
        processCssUrls: false,
        postCss: [
            require('postcss-import'),
            require('tailwindcss'),
            require('autoprefixer'),
        ],
    })
    .alias({ '@': path.join(__dirname, 'resources/js') })
    .browserSync('manuscrite.test');

if (mix.inProduction()) {
    mix.version();
}
