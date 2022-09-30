const mix = require('laravel-mix');
require('laravel-mix-jigsaw');

mix.disableSuccessNotifications().setPublicPath('source/assets/build');

mix.jigsaw()
    .browserSync({ server: 'build_local', files: ['build_local/**'] })
    .js('source/_assets/js/main.js', 'js')
    .css('source/_assets/css/main.css', 'css', [require('tailwindcss')])
    .version();
