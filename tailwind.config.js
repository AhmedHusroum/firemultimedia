/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors');
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontfamily: {
        },
        extend: {
            fontfamily: {
            },
            colors: {
                emerald: colors.emerald
            }
        },
    },
    plugins: [require("daisyui")],
}
