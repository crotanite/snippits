const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'aot',

    darkMode: 'media',

    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            width: {
                gutter: '2%',
                masonry: '49%',
            }
        },
    },
    variants: {
        extend: {
            float: ['even', 'odd'],
        }
    },
};
