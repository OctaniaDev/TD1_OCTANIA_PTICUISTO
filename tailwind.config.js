/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./**/*.php'],
  theme: {
    extend: {
      colors: {
        'bleu': '#2a3990',
        'blanc': '#ffffff',
        'gris': '#999999',
        'bleu-clair': '#7890cd',
      },
      fontFamily: {
        'titre': ["Permanent Marker"],
        'texte': ["Pacifico"],
      },
    },
  },
  plugins: [require("daisyui")],
}
