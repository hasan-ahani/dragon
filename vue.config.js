const path = require("path");


module.exports = {
    pages: {
        'auth': {
            entry: './src/app/auth/main.js',
            template: 'public/index.html',
            title: 'Auth User',
            excludeChunks: ['chunk-vendors', 'chunk-common'],
            chunks: ['auth'],
        },
        'panel': {
            entry: './src/app/user/main.js',
            template: 'public/index.html',
            title: 'User Panel',
            chunks: [ 'chunk-vendors', 'chunk-common', 'panel'],
        },
        'admin': {
            entry: './src/app/admin/main.js',
            template: 'public/index.html',
            title: 'Admin Panel',
            chunks: [ 'chunk-vendors', 'chunk-common', 'admin'],
        }
    },
    outputDir: path.resolve(__dirname, "assets/modules/dragon"),
    productionSourceMap: false,
    devServer: {
        port: 7300,
        disableHostCheck: true
    },
    configureWebpack: {
        devtool: 'source-map',
        output: {
            filename: './js/[name].js',
            chunkFilename: './js/[name].js'
        }
    },
    chainWebpack: config => {
        if(config.plugins.has('extract-css')) {
            const extractCSSPlugin = config.plugin('extract-css')
            extractCSSPlugin && extractCSSPlugin.tap(() => [{
                filename: './css/[name].css',
                chunkFilename: './css/[name].css'
            }])
        }

        config.plugins.delete('ico')
        config.plugins.delete('html')
        config.plugins.delete('admin.html')
        config.plugins.delete('auth.html')
        config.plugins.delete('panel.html')
        config.plugins.delete('preload')
        config.plugins.delete('prefetch')
    },

}
