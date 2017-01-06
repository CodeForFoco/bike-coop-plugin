var elixir = require('laravel-elixir');
elixir.config.assetsPath = 'assets/';
elixir.config.publicPath = 'assets/';
elixir(function(mix) {
    mix.sass('slider-module.scss', 'assets/css/slider-module.min.css');
});