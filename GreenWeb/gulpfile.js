'use strict';
var gulp = require('gulp');
var compile = require('gulp-sass')(require('sass'));
var concat = require('gulp-concat');
gulp.task('compile', function () {
    return gulp.src('src/sass/**/*.scss')
        // .pipe(concat('custom.scss'))
        .pipe(gulp.dest('src/css/compiled-css'))
        .pipe(compile().on('error', compile.logError));
});

gulp.task('watch',function (){
    gulp.watch('src/sass/**/*.sass', gulp.series(['compile']));
});