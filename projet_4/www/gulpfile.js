let gulp = require('gulp');
let sass = require('gulp-sass');
let concat = require('gulp-concat');
let minify = require('gulp-minify');
let cleanCSS = require('gulp-clean-css');
let uglifycss = require('gulp-uglifycss');
let plumber = require('gulp-plumber');

gulp.task('sass', function () {
    return gulp.src('./assets/css/app.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS({compatibility: 'edge'}))
        .pipe(uglifycss({
            "maxLineLen": 80,
            "uglyComments": true
        }))
        .pipe(gulp.dest('./public/build/css'));
});

gulp.task('sassMail', function () {
    return gulp.src('./assets/css/mail.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS({compatibility: 'edge'}))
        .pipe(uglifycss({
            "maxLineLen": 80,
            "uglyComments": true
        }))
        .pipe(gulp.dest('./templates/mail/css'));
});

gulp.task('scripts', function() {
    return gulp.src('./assets/js/**/*')
        .pipe(plumber())
        .pipe(concat('all.js'))
        .pipe(minify())
        .pipe(gulp.dest('./public/build/js'));
});

gulp.task('watch', function () {
    gulp.watch('./assets/**/*', ['sass','scripts','sassMail']);
});