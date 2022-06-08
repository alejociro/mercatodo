const mix = require('laravel-mix');

mix.js("resources/js/app.js", "public/js")
    .vue()
    .sass("resources/scss/app.scss", "public/css")
    .options({
        postCss: [
            require("tailwindcss"),
            require("autoprefixer"),
        ],
    })
    .version();
