/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        unlimited: {
          50: '#FFE9E6',
          100: '#FFD7D1',
          200: '#FFAB9E',
          300: '#FE8471',
          400: '#FE5C43',
          500: '#FE3312',
          600: '#DA1E01',
          700: '#A31601',
          800: '#6B0F00',
          900: '#380800',
          950: '#190300'
        },
      },
    },
    fontFamily: {
      // 'your-font-name': ['your-font-name', 'sans-serif', 'system-ui'], 
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
  ],
}