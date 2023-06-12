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
        'nav-items' : '#2F3147',
        'blue-main': '#4351FF',
        'header': '#37373E',
        'subheader': '#676767',
        'footer': '#040505',
        'form-bg': '#F6F7F9',
        'sidebar': '#f9f9f9',
        'sidebar-items': '#94A3B8',
        'calendar': '#4A5660',
        'increase': '#40D37B',
        'black-main': '#2c2c2c',
        'breadcrumbs': '#4B5563',
        'card': '#1F2937',
      },
      fontFamily:{
        'Mplus1': 'M PLUS 1, sans-serif',
        'Mulish': 'Mulish, sans-serif',
        'Roboto-Condensed': 'Roboto Condensed, sans-serif',
        'Roboto': 'Roboto, sans-serif',
        'Serif': 'sans-serif',
        'Poppins': 'Poppins, sans-serif',
        'Nunito': 'Nunito, sans-serif',
        'Mukta': 'Mukta, sans-serif',
        'Publicsans' : 'Public Sans, sans-serif',
        'Jost' : 'Jost, sans-serif',
      }
    },
  },
  plugins: [],
}

