// default
// export default {
//     plugins: {
//         tailwindcss: {},
//         autoprefixer: {},
//     },
// };

// working
module.exports = {
    plugins: [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
        require('@fullhuman/postcss-purgecss')({
            content: [
                './resources/**/*.blade.php',
                './resources/**/*.js',
            ],
            defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || [],
        }),
        
    ]
}

