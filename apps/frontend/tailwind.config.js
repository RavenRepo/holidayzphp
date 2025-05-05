import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            colors: {
                brand: {
                    blue: {
                        DEFAULT: '#0056B3',
                        light: '#0066CC',
                        dark: '#004080'
                    },
                    saffron: {
                        DEFAULT: '#FF9933',
                        light: '#FFB366',
                        dark: '#FF8000'
                    }
                },
                neutral: {
                    50: '#F9FAFB',
                    100: '#F3F4F6',
                    200: '#E5E7EB',
                    300: '#D1D5DB',
                    400: '#9CA3AF',
                    500: '#6B7280',
                    600: '#4B5563',
                    700: '#374151',
                    800: '#1F2937',
                    900: '#111827'
                },
                gray: defaultTheme.colors.gray, // Keep default grays
            },
            fontFamily: {
                'poppins': ['Poppins', 'sans-serif'],
                'open-sans': ['Open Sans', 'sans-serif']
            },
            spacing: {
                '72': '18rem',
                '84': '21rem',
                '96': '24rem'
            },
            maxWidth: {
                '8xl': '88rem'
            },
            boxShadow: {
                'soft': '0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03)',
                'card': '0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.01)'
            },
            borderRadius: {
                'xl': '1rem',
                '2xl': '2rem'
            }
        },
    },

    plugins: [forms],
}; 