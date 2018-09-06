let mix = require('laravel-mix');
require('laravel-mix-tailwind');

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
   .less('resources/less/app.less', 'public/css')
   .less('resources/less/vendor.less', 'public/css')
    .options({
        processCssUrls: false
    })
    .webpackConfig({
        resolve: {
            symlinks: false,
            alias: {
                '@': path.resolve(__dirname, './resources/js/')
            }
        }
    })
   .tailwind();
