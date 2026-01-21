/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./views/**/*.php",
    "./public/**/*.php",
    "./public/**/*.html",
  ],
  theme: {
    extend: {
      fontFamily: {
        title: ['Freckle Face', 'sans-serif'],
      },
    },
  },
  plugins: [],
}

