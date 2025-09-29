const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const uglify = require("gulp-uglify");

gulp.task("styles", function () {
    return gulp
        .src("src/assets/css/**/*.scss")
        .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
        .pipe(gulp.dest("dist/css"));
});

gulp.task("scripts", function () {
    return gulp
        .src("src/assets/js/**/*.js")
        .pipe(uglify())
        .pipe(gulp.dest("dist/js"));
});

gulp.task("default", gulp.parallel("styles", "scripts"));
