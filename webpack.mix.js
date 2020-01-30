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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.scripts([
	'resources/js/jquery.min.js',
	'resources/js/bootstrap.bundle.min.js',
	'resources/js/adminlte.min.js',
	], './public/js/main.js');

mix.styles([
	'resources/css/fontawesome.all.min.css',
	'resources/css/icheck-bootstrap.min.css',
	'resources/css/adminlte.min.css',
	], './public/css/main.css');
