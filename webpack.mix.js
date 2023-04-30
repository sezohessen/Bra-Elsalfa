const mix = require('laravel-mix');
const path = require('path');

mix.js([
    'resources/js/app.js',
], 'public/js')
    .vue()
    .webpackConfig({
        resolve: {
            extensions: ['.js', '.vue', '.json'],
            alias: {
                '@': path.resolve('resources/js'),
            },
        },
    });

