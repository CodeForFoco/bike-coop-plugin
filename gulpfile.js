var elixir = require('laravel-elixir');
elixir.config.assetsPath = 'assets/';
elixir.config.publicPath = 'assets/';
elixir(function(mix) {
    mix.sass('bike-coop-plugin.scss', 'assets/css/bike-coop-plugin.css');
        //.copy('node_modules/slick-carousel/slick/*.gif', 'assets/css/vendor/slick/')
        //.copy('node_modules/numeral/min/numeral.min.js', 'assets/js/inc/')
        //.copy('node_modules/masonry-layout/dist/*.js', 'assets/js/vendor/masonry')
          //.scripts(['assets/js/utils.js', 'assets/js/admin/main.js'], "assets/js/admin/app.js");
});