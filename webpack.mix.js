const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('public').mergeManifest();

// mix.js(__dirname + '/Resources/assets/js/app.js', 'js/cupgeo.js')
mix.less( __dirname + '/node_modules/flag-icon-css/less/flag-icon.less', 'admin/assets/css/cupgeo.css');

if (mix.inProduction()) {
    mix.version();
}
