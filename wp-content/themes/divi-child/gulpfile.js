var themename = 'divi-child';
var gulp = require( 'gulp' ),
    autoprefixer = require( 'gulp-autoprefixer' ),
    browserSync  = require( 'browser-sync' ).create(),
    reload  = browserSync.reload,
    sass  = require( 'gulp-sass' ),
    cleanCSS  = require( 'gulp-clean-css' ),
    sourcemaps  = require( 'gulp-sourcemaps' ),
    concat  = require( 'gulp-concat' ),
    imagemin  = require( 'gulp-imagemin' ),
    changed = require( 'gulp-changed' ),
    uglify  = require( 'gulp-uglify' ),
    lineec  = require( 'gulp-line-ending-corrector' );

var root  = '../' + themename + '/',
    scss  = root + 'sass/',
    themeCSS  = root + 'dist/css/',
    js  = root + 'js/',
    jsdist  = root + 'dist/js/';

// Watch Files
var PHPWatchFiles  = root + '**/*.php',
    styleWatchFiles  = root + '**/*.scss';

// Files from JS addons
var jsSRC = [
     js + 'custom.js',
];

// Files from Styling addons
var cssSRC =  [
themeCSS + 'style.css',
];

var imgSRC = root + 'images/*',
    imgDEST = root + 'dist/images/';

function css() {
  return gulp.src([scss + 'style.scss'])
  .pipe(sourcemaps.init({loadMaps: true}))
  .pipe(sass({
    outputStyle: 'expanded'
  }).on('error', sass.logError))
  .pipe(autoprefixer('last 2 versions'))
  .pipe(sourcemaps.write())
  .pipe(lineec())
  .pipe(gulp.dest(themeCSS));
}

function concatCSS() {
  return gulp.src(cssSRC)
  .pipe(sourcemaps.init({loadMaps: true, largeFile: true}))
  .pipe(concat('theme-style.min.css'))
  .pipe(cleanCSS())
  .pipe(sourcemaps.write('./maps/'))
  .pipe(lineec())
  .pipe(gulp.dest(themeCSS));
}

function javascript() {
  return gulp.src(jsSRC)
  .pipe(concat('theme.js'))
  .pipe(uglify())
  .pipe(lineec())
  .pipe(gulp.dest(jsdist));
}

function imgmin() {
  return gulp.src(imgSRC)
  .pipe(changed(imgDEST))
      .pipe( imagemin([
        imagemin.gifsicle({interlaced: true}),
        imagemin.jpegtran({progressive: true}),
        imagemin.optipng({optimizationLevel: 5})
      ]))
      .pipe( gulp.dest(imgDEST));
}

function watch() {
  gulp.watch(styleWatchFiles, gulp.series([css, concatCSS]));
  gulp.watch(jsSRC, javascript);
  gulp.watch(imgSRC, imgmin);
  gulp.watch([PHPWatchFiles, jsdist + 'theme.js', themeCSS + 'theme-style.min.css']);
}

function watch_sync() {
  
  browserSync.init({
    open: 'local',
    proxy: 'projectname.local/',
    port: 8080,
  });

  gulp.watch(styleWatchFiles, gulp.series([css, concatCSS]));
  gulp.watch(jsSRC, javascript);
  gulp.watch(imgSRC, imgmin);
  gulp.watch([PHPWatchFiles, jsdist + 'theme.js', themeCSS + 'theme-style.min.css']).on('change', browserSync.reload);
}

exports.css = css;
exports.concatCSS = concatCSS;
exports.javascript = javascript;
exports.watch = watch;
exports.imgmin = imgmin;

var build = gulp.parallel(watch);
var build_sync = gulp.parallel(watch_sync);
gulp.task('start', build);
gulp.task('start-sync', build_sync);