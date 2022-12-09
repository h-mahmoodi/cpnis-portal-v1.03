const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: ['./src/**/*.{html,js}', './node_modules/tw-elements/dist/js/**/*.js'],
    plugins: [require('tw-elements/dist/plugin')],
    mode: 'jit',
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
        },
        screens: {
            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1300px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1300px',
            // => @media (min-width: 1536px) { ... }
          }
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

};
