/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // Template files
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './resources/views/**/*.blade.php',
    './resources/views/components/**/*.blade.php',
    './resources/views/layouts/**/*.blade.php',
    './resources/views/partials/**/*.blade.php',
    './storage/framework/views/*.php',
  ],
  safelist: [
    // Add classes that might be dynamically generated
    'text-brandblue',
    'bg-brandblue',
    'text-saffron',
    'bg-saffron',
    // Navigation classes
    'nav-item',
    'nav-link',
    // Common utility classes that might be dynamic
    'hidden',
    'block',
    'flex',
    'md:flex',
    'lg:flex'
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Open Sans', 'system-ui', 'sans-serif'],
        heading: ['Poppins', 'system-ui', 'sans-serif'],
        body: ['Open Sans', 'system-ui', 'sans-serif'],
      },
      colors: {
        brandblue: '#0056B3',
        saffron: '#FF9933',
      },
    },
  },
  plugins: [],
};