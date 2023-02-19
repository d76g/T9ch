const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        screens:{
            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                jomhuria:['Jomhuria'],
                changa:['Changa'],
                plex:['IBM Plex Sans Arabic'],
                playfair:['Playfair Display'],
                space:['Space Mono'],
            },
            colors:{
                'dark-blue':'#191B28',
                'blue':'#6E00FF',
                'yellow':'#FFCF00',
                'Mygray':'#F0F4F3',
                'red':'#EF5141',
                'code':'#1C2833'
            },
            height:{
                '90vh': '90vh',
                '80vh': '80vh',
                '70vh': '70vh',
                '60vh': '60vh',
                '50vh': '50vh',
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
