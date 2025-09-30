const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();

// paths
const paths = {
    scss: 'src/assets/css/**/*.scss',
    cssDest: 'dist/css',
    templates: ['src/templates/**/*.twig', 'src/data/**/*.json', '*.php']
};

// Tâche SCSS : compile + minifie + sourcemaps
function styles() {
    return gulp.src('src/assets/css/style.scss')
        .pipe(sourcemaps.init()) 
        .pipe(sass().on('error', sass.logError)) 
        .pipe(cleanCSS({ compatibility: 'ie8' })) 
        .pipe(rename({ suffix: '.min' })) 
        .pipe(sourcemaps.write('.')) 
        .pipe(gulp.dest(paths.cssDest))
        .pipe(browserSync.stream()); // live reload CSS
}

// BrowserSync + watch
function serve() {
    browserSync.init({
        proxy: "localhost:8000", 
        open: true
    });

    gulp.watch(paths.scss, styles); // watch SCSS
    gulp.watch(paths.templates).on('change', browserSync.reload); // watch twig/json/php
}

// Export des tâches
exports.styles = styles;
exports.serve = serve;
exports.default = gulp.series(styles, serve);
