/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        'node_modules/preline/dist/*.js',
    ],
    theme: {
        extend: {
            backgroundColor: {
                transparent: 'transparent',
            },
        },
    },
    plugins: [
        require('preline/plugin'),
    ],
}

