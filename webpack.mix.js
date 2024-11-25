let mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .styles(
        ["resources/sass/styles1.css", "resources/sass/styles2.css"],
        "public/css/plaing.css"
    );
