// webpack.config.js
const webpack = require("webpack");

module.exports = {
    // output: {
    //     filename: 'app.js',
    // },
    plugins: [
        new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
    ],
    mode: 'development',
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /(node_modules)/,
                loader: 'babel-loader'
            },
        ],
    },
};
