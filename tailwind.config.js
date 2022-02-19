module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            fontFamily:{
            poppins: " 'Poppins', 'sans-serif' ",
            hpoppins: "'Poppins', 'sans-serif'",
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
