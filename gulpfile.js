/*jshint globalstrict: true*/
'use strict';

var gulp          = require('gulp');
var stylus        = require('gulp-stylus');
var concat        = require('gulp-concat');
var autoprefixer  = require('autoprefixer-stylus');
var browserSync   = require('browser-sync').create();

gulp.task('css', function () {
  gulp.src([
    './catalog/view/theme/organiqueshop/stylesheet/stylesheet.css',
    './catalog/view/theme/organiqueshop/stylesheet/index.styl'
    ])
    .pipe(stylus({
      compress: false,
      use: [
        autoprefixer({
          browsers: ['> 1%', 'IE 10', 'last 2 versions'],
        }),
      ],
    }))
    .pipe(concat('main.css'))
    .pipe(gulp.dest('./catalog/view/theme/organiqueshop/stylesheet'));
});

gulp.task('watch', function() {
    gulp.watch('./catalog/view/theme/organiqueshop/stylesheet/*.styl', ['css']);
});

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: 'http://organiqueshop2:8888'
    });
});

gulp.task('default', ['css', 'watch', 'browser-sync']);
