module.exports = {
  purge: [
    './resources/**/*.{js,vue,html}',
     './public/app/themes/wordpress/**/*.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography')
  ],
}
