const gulp = require('gulp');
const  sass = require('gulp-sass')(require('sass')) ;

//compile
gulp.task('sass', async function () {
    gulp.src('src/styles/sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('src/styles/css'));

});

//compile and watch
gulp.task('sass:watch', function() {
    gulp.watch('src/styles/sass/*.scss', gulp.series(['sass']));

});