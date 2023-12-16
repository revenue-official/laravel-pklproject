/** @type {import('tailwindcss').Config} */
export default {
    content: [ "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    ],

    theme: {
        screens: {
            'sm': '640px', // Smartphone (portrait)
                'md': '768px', // Smartphone (landscape) dan Tablet
                'lg': '1024px', // Laptop dan Desktop
                'xl': '1280px', // Desktop yang lebih besar
        }

        ,
        container: {
            center: true,
        }

        ,
        extend: {
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            }

            ,
            fontWeight: {
                light: 300,
                    normal: 400,
                    semibold: 600,
                    bold: 700,
                    extrabold: 800,

            }

            ,
        }

        ,
    }

    ,

    plugins: [],
    darkMode: "class",
}

;
