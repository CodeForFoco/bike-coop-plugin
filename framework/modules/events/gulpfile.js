var elixir = require('laravel-elixir');
elixir.config.assetsPath = 'assets/';
elixir.config.publicPath = 'assets/';
elixir(function(mix) {
    mix.sass('events-module.scss', 'assets/css/events-module.css');
});