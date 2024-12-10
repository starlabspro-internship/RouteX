let mix = require('laravel-mix');

mix
  .js('src/app.js', 'dist/')
  .sass('src/app.scss', 'dist/')
  .sass('src/_header.scss', 'dist/header.css')
  .webpackConfig({
    stats: {
      // children: true,
    },
  });
