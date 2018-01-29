// If you're interested in automating more control, check out gulpjs.com for more dependencies
// This is meant as a starting point. You can do a LOT more with gulpjs than this

// Requiring dependencies here, make sure to add them via the terminal
var gulp   = require('gulp'),
    sass   = require('gulp-sass'),
    concat = require('gulp-concat'),
    minify = require('gulp-minify');

// Need to create a /css folder and a /sass folder inside the /css folder
gulp.task('styles', function() {
  return gulp.src('./sass/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(concat('main.css'))
    .pipe(gulp.dest('css/'));
});
// Obviously enqueue this new css file "main.css" in your functions.php

gulp.task('scripts', function() {
  gulp.src('./js/*.js')
    .pipe(minify({
    	ext: {
    		src: 'main.js', // create main.js for all your extra theme JS
    		min: '.min.js'
    	}
    }))
    .pipe(gulp.dest('js/min/'))
	// enqueue this minified file in your functions.php file
});

// Gulp is watching you and your coding with the command: gulp watch
gulp.task('watch', function() {
  gulp.watch('./sass/*.scss', ['styles']);
  gulp.watch('./js/*.js', ['scripts']);
});

gulp.task('default', ['watch', 'styles']);
