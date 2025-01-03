const path = require('path')

const postCSSPlugins = [
    require('postcss-import'),
    require('postcss-simple-vars'),
    require('postcss-nested'),
    require('autoprefixer')
]

module.exports = {
    entry: './assets/scripts/App.js',
    output: {
        filename: 'bundled.js',
        path: path.resolve(__dirname)
    },
    // devServer: {
    //     static: {
    //         directory: path.join(__dirname, 'pms')
    //     },
    //     hot: true,
    //     port: 3000,
    //     liveReload: false
    // },
    mode: 'development',
    watch: true,
    module: {
        rules: [
            {
                test: /\.css$/i,
                use: ['style-loader', 'css-loader', {loader: 'postcss-loader', options: {postcssOptions: {plugins: postCSSPlugins}}}]
            }
        ]
    }
}