module.exports = function () {
    $.gulp.task('clean', function () {
        return $.del('./assets/js')
    })
};
