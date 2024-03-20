/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            'primary': '#F09092',
            'secondary': {
                100: '#E2E2D5',
                200: '#888883',
            }
        },
    },
  },
  plugins: [require('@tailwindcss/typography'),],
}

