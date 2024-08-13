const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '4rem',
        xl: '6rem',
        '2xl': '8rem',
      },
    },
    extend: {
      colors: {
        'soft-dark-green': '#006633',
        'soft-light-green': '#99CC99',
      },
      dropShadow: {
        '3xl': '0 25px 25px rgba(0, 0, 0, 0.15)',
        '4xl': [
          '0 25px 25px rgba(0, 0, 0, 0.15)',
          '0 35px 55px rgba(0, 0, 0, 0.10)',
        ],
      },
      keyframes: {
        glow: {
          '0%, 100%': { filter: 'drop-shadow(0 0 8px #006633)' },
          '50%': { filter: 'drop-shadow(0 0 16px #99CC99)' },
        },
      },
      animation: {
        glow: 'glow 3s ease-in-out infinite',
      },
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [],
}
