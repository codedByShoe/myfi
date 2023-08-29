import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: ['./views/**/*.php',],
    theme: {
        extend: {},
    },
    plugins: [forms],
};
