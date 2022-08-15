const gulp = require('gulp');
const  sass = require('gulp-sass')(require('sass')) ;

//compile
gulp.task('sass', async function () {
     gulp.src('src/sass/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('src/css'));

});

//compile and watch
gulp.task('sass:watch', function() {
    gulp.watch('src/sass/*.scss', gulp.series(['sass']));

});

