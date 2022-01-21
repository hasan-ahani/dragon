"use strict";

const pkg = require('./package.json');

let style = `/*
 * Theme Name: ${capitalize(pkg.name)}
 * Theme URI: ${pkg.url}
 * Author: ${pkg.author}
 * Author URI: ${pkg.homepage}
 * Description: ${pkg.description}
 * Version: ${pkg.version}
 * Requires at least: 5.3
 * Requires PHP: 7.4
 * License: 
 * License URI: 
 * Text Domain: ${pkg.name.toLowerCase()}
 */
`
global.$ = {
    task: [
        './gulp/clean',
        // './gulp/copy',
        // './gulp/pug',
        './gulp/scripts',
        './gulp/serve',
        './gulp/styles',
        './gulp/release',
        './gulp/watch'
    ],
    gulp: require('gulp'),
    browserSync: require('browser-sync').create(),
    del: require('del'),
    root: __dirname,
    pkg,
    headers: {
        style
    }
};


$.task.forEach(function (taskPath) {
    require(taskPath)();
});




$.gulp.task('dev', $.gulp.series(
    'clean',
    $.gulp.parallel(
        // 'pug',
        // 'copy:img',
        // 'copy:fonts',
        // 'copy:lib',
        'styles:theme',
        'styles:dev',
        'styles-rtl:dev',
        'js:dev'
    )
));

$.gulp.task('build', $.gulp.series(
    'clean',
    $.gulp.parallel(
        // 'pug',
        // 'copy:img',
        // 'copy:fonts',
        // 'copy:lib',
        'styles:build',
        'js:build'
    )
));


$.gulp.task('build-min', $.gulp.series(
    'clean',
    $.gulp.parallel(
        // 'pug',
        // 'copy:img',
        // 'copy:fonts',
        // 'copy:lib',
        'styles:build-min',
        'js:build-min'
    )
));

$.gulp.task('default', $.gulp.series(
    'dev',
    $.gulp.parallel(
        'watch',
        'serve'
    )
));


function capitalize(s)
{
    return s[0].toUpperCase() + s.slice(1);
}
