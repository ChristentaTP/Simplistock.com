/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",                  // jika ada file HTML di root folder
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  }
  