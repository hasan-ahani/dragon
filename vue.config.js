const path = require("path");


module.exports = {
    pages: {
        index: {
            entry: './src/app/system/main.js',
            template: 'public/index.html',
            title: 'Design System',
            chunks: [ 'chunk-vendors', 'chunk-common', 'system'],
        },
        auth: {
            entry: './src/app/auth/main.js',
            template: 'public/index.html',
            title: 'Auth User',
            chunks: [ 'chunk-vendors', 'chunk-common', 'auth'],
        },
        dashboard: {
            entry: './src/app/dashboard/main.js',
            template: 'public/index.html',
            title: 'User Dashboard Panel',
            chunks: [ 'chunk-vendors', 'chunk-common', 'dashboard'],
        },
        admin: {
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
