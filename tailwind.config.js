/**@type {
    import('tailwindcss').Config
}
*/

module.exports= {

    content: [ "./resources/**/*.blade.php",
    "./resources/**/*.{js,css}",
    ],
    theme: {
        extend: {
            screens: {
                'sm': {
                    'max': '425px'
                        // smartphone
                }

                ,

                'md': {
                    'max': '426px'
                        // tablet
                }

                ,

                'lg': {
                    'max': '769px'
                        // laptop
                }

                ,

                'xl': {
                    'min': '1441px'
                        // desktop
                }

                ,
            }

            ,


        }

        ,
    }

    ,
    darkMode: 'class',

}
