module.exports = {
    purge: [
        './src/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        colors: {
            primary: {
                50:     '#F5F9FE',
                100:    '#EBF5FF',
                200:    '#D7EAFD',
                300:    '#C3E0FD',
                400:    '#AED5FB',
                500:    '#9ACAFB',
                600:    '#86BFFA',
                700:    '#72B5F9',
                800:    '#5DAAF8',
                900:    '#4AA0F7',
                default: '#3595F6',
            },
            success: '#22C55E',
            danger: '#E81C4D',
            warning: '#FCD34D',
            light: '#F7F8F9',
            white: '#FFF',
            transparent: 'transparent',
            current: 'currentColor',
            dark: {
                50 : '#F4F5F6',
                100 : '#EBECEE',
                200 : '#D6D9DD',
                300 : '#C2C6CC',
                400 : '#ADB3BB',
                500 : '#99A0AA',
                600 : '#858D99',
                700 : '#717A88',
                800 : '#5C6777',
                900 : '#485466',
                'default' : '#334155',
            },
            gray: {
                100: '#F0F2F4',
                200: '#E0E3E8',
                300: '#D1D6DD',
                400: '#C1C7D1',
                500: '#B2BAC5',
                600: '#A2ACB9',
                700: '#939EAE',
                800: '#8390A2',
                900: '#748297',
                default: '#64748B',
            },
        },
        fontFamily: {
          body: ['IranYekanBakh', 'sans-serif'],
          display: ['IranYekanBakh', 'sans-serif'],
          head: ['IranYekanBakh', 'sans-serif'],
        },
        extend: {
            transitionProperty: {
                'height': 'height',
                'max-height': 'max-height',
                'spacing': 'margin, padding',
            },
            dropShadow: {
                '3xl': '0px 2px 61px rgba(51, 65, 85, 0.1)',
            },
            boxShadow: {
                'sm': '0px 1.60568px 61.0158px rgba(0,0,0,.05)',
                '3xl': '0px 2px 61px rgba(51, 65, 85, 0.1)',
            }
        },
    },
}
