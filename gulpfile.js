var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.sass('app.scss');

    mix.copy('bower_components/bootstrap/dist/fonts', 'public/build/fonts');

   	mix.copy('bower_components/fontawesome/fonts', 'public/build/fonts');

   	mix.styles([
        'bower_components/bootstrap/dist/css/bootstrap.css',
        'bower_components/fontawesome/css/font-awesome.css',
        'public/css/app.css',
    ], 'public/css/styles.css', './');

    mix.scripts([
        'bower_components/jquery/dist/jquery.js',
        'bower_components/bootstrap/dist/js/bootstrap.js',
        'bower_components/Chart.js/Chart.js',
        'bower_components/metisMenu/dist/metisMenu.js'
    ], 'public/js/frontend.js', './');

    mix.version( [ 'public/css/styles.css' , 'public/js/frontend.js' ] );
    
});
