const {src, dest, watch, series } = require('gulp');
const gulp = require('gulp');
const sassCompiler = require('gulp-sass')(require('sass'));
const minifyCss = require('gulp-clean-css')
const sourcesMaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const browserSync = require('browser-sync').create();

sassCompiler.compiler = require('node-sass');

gulp.task('bundleSass', () => {
    return gulp.src([
        './assets/scss/**/*.scss',
        './assets/css/**/*.css'
    ])
        .pipe(sourcesMaps.init())
        .pipe(sassCompiler().on('error', sassCompiler.logError))
        .pipe(minifyCss())
        .pipe(sourcesMaps.write())
        .pipe(concat('theme.min.css'))
        .pipe(dest('./build'))
        .pipe(browserSync.stream())
});

gulp.task('bundleJs', () => {
    return gulp.src([
        './assets/js/**/*.js'
    ])
        .pipe(uglify())
        .pipe(concat('theme.min.js'))
        .pipe(gulp.dest('./build'))
        .pipe(browserSync.stream())
});

gulp.task('dev', function() {

    browserSync.init({
        host: 'localhost',
        port: 3000,
        files: [
            './**/*.php',
            './**/*.html',
            './assets/scss/**/*.scss',
            './assets/css/**/*.css',
            './assets/js/**/*.js'
        ],
        proxy: "http://estudos.local"
    });

    watch('./assets/scss/**/*.scss', gulp.series('bundleSass'));
    watch('./assets/css/**/*.css', gulp.series('bundleSass'));
    watch('./assets/js/**/*.js', gulp.series('bundleJs'));
});

exports.bundleSass = 'bundleSass';
exports.default = series('dev');