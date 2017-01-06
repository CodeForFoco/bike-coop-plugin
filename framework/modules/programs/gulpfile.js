var elixir = require('laravel-elixir');
elixir.config.assetsPath = 'assets/';
elixir.config.publicPath = 'assets/';
elixir(function(mix) {
    mix.sass('programs-module.scss', 'assets/css/programs-module.css');
});