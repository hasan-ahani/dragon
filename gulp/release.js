const zip = require('gulp-zip');


module.exports = function () {
    $.gulp.task('release', function () {
        return $.gulp.src([
            './../**',
            '!gulp/**',
            '!.git/**',
            '!assets/**/*.scss',
            '!assets/**/*.html',
            '!public/**',
            '!./**/Manual.php',
            '!node_modules/**',
            '!release/**',
            '!src/**',
            '!.gitignore',
            '!.gitattributes',
            '!gulpfile.js',
            '!icon.js',
            '!webpack.config.js',
            '!composer.json',
            '!composer.lock',
            '!package.json',
            '!package-lock.json',
            '!README.md',
        ])
            .pipe(zip($.pkg.name + '-v' + $.pkg.version + '.zip'))
            .pipe($.gulp.dest('release'))
    })
};
