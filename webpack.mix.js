let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.directive.js/,
                use: [
                    {
                        loader: 'angularjs-template-loader',
                        options: {
                            relativeTo: path.resolve(__dirname, 'js/')
                        }
                    }
                ]
            }
        ]
    }
});

mix.js('js/application.js', 'www/js')
   .sass('sass/style.scss', 'www/css');
