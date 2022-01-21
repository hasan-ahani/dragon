var wpPot = require('gulp-wp-pot');


module.exports = function () {
    $.gulp.task('lang', function () {
        return $.gulp.src('**/*.php')
            .pipe(wpPot( {
                package: 'Dragon Wordpress Theme Pro',
            } ))
            .pipe($.gulp.dest('lang/dragon.pot'));
    })
};
