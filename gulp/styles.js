const plumber = require('gulp-plumber'),
    scss = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    csso = require('gulp-csso'),
    csscomb = require('gulp-csscomb'),
    sourcemaps = require('gulp-sourcemaps'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    header = require('gulp-header'),
    rtlcss = require('gulp-rtlcss'),
    fs = require('fs');
    stylesPATH = {
        "input": "./src/sass/",
        "output": "./assets/css/"
    };

module.exports = function () {
    $.gulp.task('styles:theme', () => {
        return $.gulp.src(stylesPATH.input + 'style.css')
            .pipe(header($.headers.style))
            .pipe(rename('style.css'))
            .pipe($.gulp.dest(stylesPATH.output))
    });
    $.gulp.task('styles:dev', () => {
        return $.gulp.src(stylesPATH.input + 'app.scss')
            .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
            .pipe(sourcemaps.init())
            .pipe(scss())
            .pipe(autoprefixer({
                overrideBrowserslist:  ['last 1 versions']
            }))

            .pipe(header($.headers.style))
            .pipe(sourcemaps.write())
            .pipe(rename('style.css'))
            .pipe($.gulp.dest(stylesPATH.output))
            .pipe($.browserSync.stream());
    });

    $.gulp.task('styles-rtl:dev', () => {
        return $.gulp.src(stylesPATH.input + 'app.scss')
            .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
            .pipe(sourcemaps.init())
            .pipe(scss())
            .pipe(autoprefixer({
                overrideBrowserslist:  ['last 1 versions']
            }))
            .pipe(rtlcss())
            .pipe(header($.headers.style))
            .pipe(sourcemaps.write())
            .pipe(rename('style-rtl.css'))
            .pipe($.gulp.dest(stylesPATH.output))
            .pipe($.browserSync.stream());
    });

    $.gulp.task('styles:build', () => {
        return $.gulp.src(stylesPATH.input + 'app.scss')
            .pipe(scss())
            .pipe(autoprefixer({
                overrideBrowserslist:  ['last 1 versions']
            }))
            .pipe(autoprefixer())
            .pipe(header($.headers.style))
            .pipe(csscomb())
            .pipe(rename('style.css'))
            .pipe($.gulp.dest(stylesPATH.output))
    });
    $.gulp.task('styles:build-min', () => {
        return $.gulp.src(stylesPATH.input + 'app.scss')
            .pipe(scss())
            .pipe(autoprefixer())
            .pipe(csscomb())
            .pipe(header($.headers.style))
            .pipe(csso())
            .pipe(rename('style.css'))
            .pipe($.gulp.dest(stylesPATH.output))
    });
};
