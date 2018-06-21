let mix = require('laravel-mix');
let build = require('./tasks/build.js');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/');
mix.webpackConfig({
    plugins: [
        build.jigsaw,
        build.browserSync(),
        build.watch(['source/**/*.md', 'source/**/*.php', 'source/_assets/**/*.css', 'source/_assets/**/*.js']),
    ]
});

mix.options({
    postCss: [
        require('tailwindcss')('./tailwind.js')
    ]
});

mix.postCss('source/_assets/css/main.css', 'css/main.css');

mix.js('source/_assets/js/main.js', 'js');
