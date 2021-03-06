// browser-sync watched files
// automatically reloads the page when files changed
var browserSyncWatchFiles = [
    './css/*.min.css',
    './js/*.min.js',
    './*.php'
];
// browser-sync options
// see: https://www.browsersync.io/docs/options/
var browserSyncOptions = {
    proxy: "patrizialutz.text",
    notify: false
};

var gulp = require('gulp'),
    autoprefixer = require('autoprefixer'),
    plumber = require( 'gulp-plumber' ),
    watch = require( 'gulp-watch' ),
    livereload = require( 'gulp-livereload' ),
    minifycss = require( 'gulp-cssnano' ),
    uglify = require( 'gulp-uglify' ),
    rename = require( 'gulp-rename' ),
    notify = require( 'gulp-notify' ),
    include = require( 'gulp-include' ),
    sass = require( 'gulp-sass' ),
    concat = require('gulp-concat'),
    postcss = require('gulp-postcss'),
    mqpacker = require('css-mqpacker'),
    imagemin = require('gulp-imagemin'),
    sprity = require('sprity'),
    gulpif = require('gulp-if'),
    sourcemaps = require('gulp-sourcemaps'),
    browserSync = require('browser-sync').create(),
    wpPot = require('gulp-wp-pot');

var onError = function( err ) {
    console.log( 'An error occurred:', err.message );
    this.emit( 'end' );
};

var paths = {
    /* Source paths */
    styles: './sass/**/*.scss',
    scripts: './js/',
    images: './images/**/*',

    /* Output paths */
    stylesOutput: './css/',
    scriptsOutput: './js/',
    imagesOutput: './images/',
};

gulp.task( 'styles', function() {
    return gulp.src( paths.styles, {
        style: 'expanded'
    } )
    .pipe( plumber( { errorHandler: onError } ) )
    .pipe( sass() )
    .pipe(postcss([
        autoprefixer({
            browsers: ['last 2 version']
        }),
        mqpacker({
            sort: true
        }),
    ]))
    .pipe( rename( 'main.css' ) )
    .pipe( gulp.dest( paths.stylesOutput ) )
    .pipe( minifycss() )
    .pipe(sourcemaps.write())
    .pipe( rename( { suffix: '.min' } ) )
    .pipe( gulp.dest( paths.stylesOutput ) );
});

// .pipe( notify( { message: 'Styles task complete' } ) )

gulp.task('scripts', function(){
  return gulp.src(paths.scripts + '/main.js')
      .pipe(uglify())
      .pipe(sourcemaps.write())
      .pipe( rename( { suffix: '.min' } ) )
      .pipe( gulp.dest( paths.scripts + '/min/' ) )
});

gulp.task('images', function(){
  return gulp.src(paths.images)
    .pipe(imagemin({
        optimizationLevel: 5,
        progressive: true,
        interlaced: true
    }))
    .pipe(gulp.dest(paths.imagesOutput))
});

gulp.task( 'watch', function() {
    livereload.listen();
    gulp.watch( paths.styles, [ 'styles' ] );
    gulp.watch( paths.scripts + '/*.js', [ 'scripts' ] );
    gulp.watch( paths.images, [ 'images' ] );
} );

gulp.task( 'default', [ 'watch', 'styles', 'scripts', 'images' ], function() {});
