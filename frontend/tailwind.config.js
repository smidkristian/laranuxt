const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    fontFamily: {
      'inter': ['Inter var', ...defaultTheme.fontFamily.sans],
    },
    extend: {
      //
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
