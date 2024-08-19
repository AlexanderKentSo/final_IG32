import defaultTheme from 'tailwindcss/defaultTheme';
// import forms from '@tailwindcss/forms';

const customPalette = {
    primary: "#6B0001",  // k
    "primary-content": "#E7EADF",
    secondary:"#E4AD49",  // k
    "secondary-content": "#E7EADF",
    accent: "#444340",
    "accent-content": "#E7EADF",
    neutral: "#FCEFE5",  // k
    'neutral-content': "#74340F",  // k
    "base-100": "#FFF9E1",  // k
    "base-200": "#F6E3C7",  // k
    "base-300": "#D09962",  // k
    "base-content": "#000000",  // k
    "success": "#3F7319",
    // "info": '#075985',
    info: "#598BAE",  // k
    "info-content": "#363D28",
    "warning": "#FFA31F"  // k
};

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            }
        },
    },
    plugins: [
        require("daisyui")
    ],
    daisyui: {
        themes: [
            {
                dark: {
                    ...require("daisyui/src/theming/themes")["dark"],
                    ...customPalette
                }
            }
        ],
        darkTheme: 'dark'
    }
}

