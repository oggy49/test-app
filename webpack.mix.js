const mix = require('laravel-mix')

require('mix-tailwindcss')

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

let productionSourceMaps = true

mix.postCss('resources/css/app.css', 'public/app/themes/wordpress/assets/css')
.tailwind('./tailwind.config.js')
.sourceMaps(productionSourceMaps, 'source-map')


mix.js('resources/js/app.js', 'public/app/themes/wordpress/assets/js').vue({ version: 2 })
