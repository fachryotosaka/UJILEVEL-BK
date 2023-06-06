/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        'nav-items' : '#2A2B2C',
        'blue-main':{
          100: '#00C8FF',
          200: '#19A7CE',
        },
        'header': '#2C2C2C',
        'subheader': '#8C8C8C',
        'footer': '#676767',
        'form-bg': '#F6F7F9',
        'sidebar': '#f9f9f9',
        'calendar': '#4A5660',
        'increase': '#40D37B',
      },
      fontFamily:{
        'Mplus1': 'M PLUS 1, sans-serif',
        'Mulish': 'Mulish, sans-serif',
        'Roboto-Condensed': 'Roboto Condensed, sans-serif',
        'Roboto': 'Roboto, sans-serif',
        'Serif': 'sans-serif',
        'Poppins': 'Poppins, sans-serif',
        'Nunito': 'Nunito, sans-serif',
      }
    },
  },
  plugins: [],
}

