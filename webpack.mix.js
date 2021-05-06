const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.sass('resources/sass/app.scss', 'public/css');
mix.sass('resources/sass/category.scss', 'public/css');

mix.js([
    'resources/js/top.js',
], 'public/js/top.js');

mix.js([
    'resources/js/bottom.js',
    'public/js/custom.js',
], 'public/js/bottom.js');

mix.js([
    'resources/js/category.js',
    'public/js/custom/category.js',
], 'public/js/category.js');

if (mix.inProduction()) {
    mix.version();
}

mix.disableNotifications();