const ASSET_PATH = process.env.MIX_ASSET_PATH || '/';

const mix = require('laravel-mix')
const path = require('path')
require('mix-tailwindcss')

mix
  .js('resources/js/app.js', 'public/js')
  .less('resources/less/app.less', 'public/css')
  .babelConfig({
      plugins: ['@babel/plugin-syntax-dynamic-import'],
  })
  .webpackConfig({
    output: {
        chunkFilename: 'js/[name].js?id=[chunkhash]',
        publicPath: ASSET_PATH,
    },
    resolve: {
      alias: {
        vue$: 'vue/dist/vue.runtime.esm.js',
        '@': path.resolve('resources/js'),
      },
    },
  })
  .tailwind()
  .version()
