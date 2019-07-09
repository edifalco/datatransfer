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
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/css/libs/bootstrap.min.css',
    'resources/assets/css/libs/ionicons.min.css',
    'resources/assets/css/libs/AdminLTE.css',
    'resources/assets/css/libs/_all-skins.css',
    'resources/assets/css/libs/pace.min.css'

], 'public/css/libs.css');

mix.scripts([
    'resources/assets/js/libs/jquery.min.js',
    'resources/assets/js/libs/bootstrap.min.js',
    'resources/assets/js/libs/pace.min.js',
    'resources/assets/js/libs/jquery.slimscroll.min.js',
    'resources/assets/js/libs/fastclick.js',
    'resources/assets/js/libs/adminlte.min.js',
    'resources/assets/js/libs/demo.js'

], 'public/js/libs.js');
