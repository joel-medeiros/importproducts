const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */
elixir(function(mix) {

  mix.copy(
      'node_modules/datatables.net/js/jquery.dataTables.js',
      'resources/assets/js/libs'
  ).copy(
      'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
      'resources/assets/css/libs'
  ).copy(
      'node_modules/bootswatch/paper/bootstrap.min.css',
      'resources/assets/css/libs'
  ).copy(
      'node_modules/bootbox/bootbox.min.js',
      'resources/assets/js/libs'
  );

  mix.sass('app.scss')
      .styles([
        './resources/assets/css/custom.css',
        './resources/assets/css/libs/dataTables.bootstrap.css',
        './resources/assets/css/libs/bootstrap.min.css'
      ])
      .scripts([
        './resources/assets/js/libs/jquery.dataTables.js',
        './resources/assets/js/libs/bootbox.min.js'
      ])
      .webpack('app.js');

  mix.scripts('/products.js', 'public/js/products.js');

});
