import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        // Add path to shared packages if they contain views/js with Tailwind classes
        // '../../packages/**/resources/views/**/*.blade.php',
        // '../../packages/**/resources/js/**/*.js',
    ],

    theme: {
        extend: {
            colors: {
                brandblue: '#0056B3',
                saffron: '#FF9933',
                // Add other neutral/supporting colors from design system if needed
                gray: defaultTheme.colors.gray, // Keep default grays
            },
            fontFamily: {
                heading: ['Poppins', ...defaultTheme.fontFamily.sans],
                body: ['Open Sans', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
}; 