import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                'fira-code': ['Fira Code', ...defaultTheme.fontFamily.mono], // Fira Code for monospace text
                'playfair': ['Playfair Display', ...defaultTheme.fontFamily.serif], // Playfair Display for serif text
            },
        },
    },
    plugins: [],
};
