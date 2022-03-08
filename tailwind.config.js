module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        colors: {
            primary: '#1F3986',
            orang: '#F1884F',
            reb: '#EE504F'
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
