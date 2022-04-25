let mix = require('laravel-mix');
require('laravel-mix-tailwind');

mix.setPublicPath('../Public');


// SCSS
mix.sass('./Assets/styles/tailwind.scss', '../Public/Css').tailwind();
mix.sass('./Assets/styles/main.scss', '../Public/Css');

// JS
mix.js('./Assets/scripts/main.js', 'JavaScript')
    .extract(['jquery'], 'JavaScript/libraries.js')
    .options({
        processCssUrls: false
    })
//    .sourceMaps();

mix.sourceMaps(false);

// Images / Fonts
mix.copyDirectory('Assets/fonts', '../Public/Fonts');
mix.copyDirectory('Assets/Images', '../Public/Images');
mix.copyDirectory('Assets/Icons', '../Public/Icons');

mix.autoload({
    jquery: ['$','window.jQuery',"jQuery","window.$","jquery","window.jquery"]
});
