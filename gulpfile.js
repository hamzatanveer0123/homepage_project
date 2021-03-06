var elixir = require('laravel-elixir');
// var vue = require('vue');
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
});

elixir(function(mix) {
    mix.styles('style.css');
});

elixir(function(mix) {
    mix.scripts('functions.js');
});

elixir(function(mix) {
    mix.version(['css/app.css', 'css/style.css', 'js/functions.js']);
});