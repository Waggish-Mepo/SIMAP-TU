module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        colors: {
            primary: '#1F3986'
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
