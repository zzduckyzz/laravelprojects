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

mix.styles([
    'public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css',
    'public/backend/bower_components/font-awesome/css/font-awesome.min.css',
    'public/backend/bower_components/Ionicons/css/ionicons.min.css',
    'public/backend/css/dataTables.bootstrap.min.css',
    'public/backend/dist/css/AdminLTE.css',
    'public/backend/dist/css/skins/_all-skins.min.css',
    'public/backend/plugins/iCheck/flat/blue.css',
    'public/backend/plugins/jquery-confirm/dist/jquery-confirm.min.css',
    'public/backend/css/margin_padding_style.css',
    'public/backend/css/main_style.css',
], 'public/backend/css/all.min.css').version();

mix.js([
    'public/backend/bower_components/jquery/dist/jquery.min.js',
    'public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js',
    'public/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
    'public/backend/js/import_file.js',
    'public/backend/bower_components/fastclick/lib/fastclick.js',
    'public/backend/dist/js/adminlte.js',
    'public/backend/plugins/iCheck/icheck.min.js',
    'public/backend/js/checkbox.js',
    'public/backend/dist/js/demo.js',
    'public/backend/plugins/jquery-confirm/dist/jquery-confirm.min.js',
    'public/backend/js/setting_js_datatable.js',
    'public/backend/js/main.js',
],'public/backend/js/all.min.js').autoload({
    jquery: ['$', 'window.jQuery', 'jQuery','jquery'],
}).version();

mix.styles([
    'public/fontend/bower_components/bootstrap/dist/css/bootstrap.min.css',
], 'public/backend/css/all.min.css').version();
