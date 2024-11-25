const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/admin.scss", "public/css/admin")
    .version();

if (mix.inProduction()) {
    mix.version();
}

mix.browserSync("127.0.0.1:8000");
