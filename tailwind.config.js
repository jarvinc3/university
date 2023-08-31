/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.php"],
  theme: {
    extend: {
      boxShadow: {
        'custom': '0 0 2px rgba(0,0,0,0.25)'
      }
    }
  },
  plugins: [],
}

