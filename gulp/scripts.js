const uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    babel = require('gulp-babel'),
    scriptsPATH = {
        "input": "./src/js/",
        "output": "./assets/js/"
    };

const webpack = require('webpack');
const webpackStream = require('webpack-stream');
const webpackConfig = require('./../webpack.config.js');

module.exports = function () {
    $.gulp.task('js:dev', () => {
        return $.gulp.src(scriptsPATH.input + 'app.js')
            .pipe(webpackStream(webpackConfig), webpack)
            .pipe($.gulp.dest(scriptsPATH.output))
            .pipe($.browserSync.reload({
                stream: true
            }));
    });

    $.gulp.task('js:build', () => {
        return $.gulp.src([scriptsPATH.input + 'app.js'])
            .pipe(babel({
                presets: ['@babel/env']
            }))
            .pipe($.gulp.dest(scriptsPATH.output))
    });

    $.gulp.task('js:build-min', () => {
        return $.gulp.src([scriptsPATH.input + 'app.js'])
            .pipe(babel({
                presets: ['@babel/env']
            }))
            .pipe(concat('app.min.js'))
            .pipe(uglify())
            .pipe($.gulp.dest(scriptsPATH.output))
    });
};
