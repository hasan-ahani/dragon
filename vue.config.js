
module.exports = {
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
        //
        // config.plugins.delete('ico')
        // config.plugins.delete('html')
        // config.plugins.delete('preload')
        // config.plugins.delete('prefetch')
    },
}
