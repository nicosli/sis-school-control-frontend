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

mix.sass('resources/assets/sass/app.scss', 'public/mixed/app.css');
mix.copy('resources/assets/css/fontawesome/webfonts', 'public/webfonts');

mix.styles([
    'public/mixed/app.css',
    'resources/assets/css/offcanvas.css',
    'resources/assets/css/custom.css'
], 'public/css/app.css', './');

mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    'resources/assets/js/offcanvas.js',
    'resources/assets/js/funciones.js'
], 'public/js/app.js', './');

mix.browserSync({
    open: 'external',
    host: 'local.gestionarreserva',
    proxy: 'local.gestionarreserva',
    port: 8080
});