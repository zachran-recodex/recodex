import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
                mono: ['Source Code Pro', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                primary: {
                    DEFAULT: '#86c332',
                    50: '#f6fbea',
                    100: '#e9f6d1',
                    200: '#d3eda9',
                    300: '#b6df77',
                    400: '#9acf4c',
                    500: '#86c332',
                    600: '#5f8f21',
                    700: '#496e1d',
                    800: '#3d571d',
                    900: '#344b1c',
                    950: '#19290a',
                },
                secondary: {
                    DEFAULT: '#639c80',
                    50: '#0a100d',
                    100: '#141f1a',
                    200: '#283e33',
                    300: '#3c5d4d',
                    400: '#507c67',
                    500: '#639c80',
                    600: '#83af9a',
                    700: '#a2c3b3',
                    800: '#c1d7cc',
                    900: '#e0ebe6',
                    950: '#eff5f2',
                },
                accent: {
                    DEFAULT: '#87f00f',
                    50: '#0d1802',
                    100: '#1b3003',
                    200: '#366006',
                    300: '#519009',
                    400: '#6cc00c',
                    500: '#87f00f',
                    600: '#9ff33f',
                    700: '#b7f66f',
                    800: '#cff99f',
                    900: '#e7fccf',
                    950: '#f3fde7',
                },
                background: {
                    light: '#f4f6f7',
                    dark: '#23262b',
                },
                shark: {
                    50: '#f4f6f7',
                    100: '#e3e7ea',
                    200: '#cbd1d6',
                    300: '#a7b1b9',
                    400: '#7b8995',
                    500: '#606d7a',
                    600: '#525c68',
                    700: '#474f57',
                    800: '#3f444b',
                    900: '#373b42',
                    950: '#23262b',
                },
            },
        },
    },

    plugins: [forms, typography],
};
