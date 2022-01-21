// webpack.config.js

module.exports = {
    // output: {
    //     filename: 'app.js',
    // },
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
