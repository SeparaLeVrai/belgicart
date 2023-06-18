const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                display: ['Red Hat Display', 'sans-serif'],
                classic: ['Montserrat', 'sans-serif'],
                title: ['Quicksand', 'sans-serif'],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
