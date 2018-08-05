let mix = require("laravel-mix");
const StyleLintPlugin = require("stylelint-webpack-plugin");

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
                test: /\.(js|vue)$/,
                exclude: /node_modules/,
                enforce: "pre",
                loader: "eslint-loader",
                options: {
                    formatter: require("eslint-friendly-formatter")
                }
            }
        ]
    },
    plugins: [
        new StyleLintPlugin({
            configFile: ".stylelintrc",
            context: "resources/assets/sass",
            files: [
                "components/*.scss",
                "base/*.scss",
                "helpers/*.scss",
                "utilities/*.scss",
                "app.scss"
            ],
            syntax: "scss",
            failOnError: false,
            quiet: false
        })
    ],
    output: {
        publicPath: "/",
        chunkFilename: "js/[name].js"
    }
});

mix.js("resources/assets/js/app.js", "public/js").sass(
    "resources/assets/sass/app.scss",
    "public/css"
);
