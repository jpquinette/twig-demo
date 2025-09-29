const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const browserSync = require('browser-sync').create();

// Compile SCSS → CSS
gulp.task('sass', function () {
    return gulp.src('src/assets/css/**/*.scss')
        .pipe(sass({ includePaths: ['node_modules'] }).on('error', sass.logError))
        .pipe(gulp.dest('dist/css'))
        .pipe(browserSync.stream());
});

// Serveur PHP + Browsersync
gulp.task('serve', function () {
    browserSync.init({
        proxy: "localhost:8000", // ton serveur PHP
        open: true
    });

    gulp.watch('src/assets/css/**/*.scss', gulp.series('sass'));
    gulp.watch(['src/templates/**/*.twig', 'src/data/**/*.json', '*.php']).on('change', browserSync.reload);
});

// Tâche par défaut
gulp.task('default', gulp.series('sass', 'serve'));
