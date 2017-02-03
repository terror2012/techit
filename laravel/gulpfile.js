const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js');
});
elixir(function(mix) {
    mix.copy('node_modules/socket.io', 'public/js/socket.io');
    mix.copy('node_modules/socket.io-adapter', 'public/js/socket.io-adapter');
    mix.copy('node_modules/socket.io-client', 'public/js/socket.io-client');
    mix.copy('node_modules/socket.io-parser', 'public/js/socket.io-parser');
    mix.copy('node_modules/font-awesome', 'public/css/font-awesome');
});