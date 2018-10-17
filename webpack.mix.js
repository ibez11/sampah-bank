let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/jquery-ui.min.js', 'public/js')
   .js('resources/assets/js/dashboard.js', 'public/js')
   .js('resources/assets/js/uploader.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/landing.scss', 'public/css/landing.css')
   .styles(['resources/assets/css/ns-default.css',
   'resources/assets/css/ns-style-other.css',
   'resources/assets/css/simple-loader.css',
   'resources/assets/css/spin-loader.css',
   'resources/assets/css/font-awesome.min.css',
   'resources/assets/css/jquery-ui.min.css',
   'resources/assets/css/new-age.min.css'
 ], 'public/css/all.css')
    .styles('resources/assets/css/dropzone.css', 'public/css/dropzone.css');

 mix.sass('resources/assets/sass/dashboard.scss', 'public/css/dashboard.css');
