const mix = require('laravel-mix');
require("laravel-mix-vue3");
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.ts('resources/js/app.ts', 'public/ts')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]).vue();
