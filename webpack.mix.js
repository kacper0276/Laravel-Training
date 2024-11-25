let mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .scripts(["public/js/admin.js", "public/js/admin2.js"], "public/js/all.js")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/admin.scss", "public/css/admin");
