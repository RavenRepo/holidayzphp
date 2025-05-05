module.exports = {
  plugins: {
    'postcss-import': {},
    'tailwindcss/nesting': {},
    tailwindcss: {},
    autoprefixer: {
      overrideBrowserslist: ['> 1%', 'last 2 versions', 'not dead'],
      grid: true
    },
    'postcss-preset-env': {
      features: {
        'nesting-rules': false
      }
    }
  },
};