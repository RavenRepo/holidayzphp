import preset from './vendor/filament/support/tailwind.config.preset'

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                brandblue: {
                    50: 'rgb(var(--color-brandblue-50))',
                    100: 'rgb(var(--color-brandblue-100))',
                    200: 'rgb(var(--color-brandblue-200))',
                    300: 'rgb(var(--color-brandblue-300))',
                    400: 'rgb(var(--color-brandblue-400))',
                    500: 'rgb(var(--color-brandblue-500))',
                    600: 'rgb(var(--color-brandblue-600))',
                    700: 'rgb(var(--color-brandblue-700))',
                    800: 'rgb(var(--color-brandblue-800))',
                    900: 'rgb(var(--color-brandblue-900))',
                    950: 'rgb(var(--color-brandblue-950))',
                },
                saffron: {
                    50: 'rgb(var(--color-saffron-50))',
                    100: 'rgb(var(--color-saffron-100))',
                    200: 'rgb(var(--color-saffron-200))',
                    300: 'rgb(var(--color-saffron-300))',
                    400: 'rgb(var(--color-saffron-400))',
                    500: 'rgb(var(--color-saffron-500))',
                    600: 'rgb(var(--color-saffron-600))',
                    700: 'rgb(var(--color-saffron-700))',
                    800: 'rgb(var(--color-saffron-800))',
                    900: 'rgb(var(--color-saffron-900))',
                    950: 'rgb(var(--color-saffron-950))',
                },
            },
        },
    },
}
