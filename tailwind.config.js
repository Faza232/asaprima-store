// /** @type {import('tailwindcss').Config} */
// export default {
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                main: "#039845",
                second: "#F0FCF2",
                third: "#729A78",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
//}
