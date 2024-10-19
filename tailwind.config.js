/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./app/**/*.php",
    "./views/**/*.php",
    "./public/css/**/*.css",
    "./public/js/**/*.js",
    "./public/index.php",
  ],
  theme: {
    extend: {
      colors: {
        dark: "#22272E",
        darkBlue: "#1C375B",
        darkRed: "#CD4236",
        lightBlue: "#B8D8C7",
        lightRed: "#DAAAA6",
      },
    },
  },
  plugins: [],
};
