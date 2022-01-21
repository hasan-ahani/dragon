const fontagon = require('fontagon')

fontagon({
    files: [
        'src/icon/*.svg'
    ],
    dist: 'assets/fonts/dragon/',
    fontName: 'dragon',
    //style: 'all',
    cssFontsUrl: '/wp-content/themes/dragon/assets/fonts/dragon/',
    style: ['css'],
    html: true,
    classOptions: {
        baseClass: 'dr',
        classPrefix: 'dr'
    }
}).then((opts) => {
    console.log('done! ' ,opts)
}).catch((err) => {
    console.log('fail! ', err)
})
