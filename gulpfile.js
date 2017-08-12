var gulp = require('gulp');
var gutil = require('gulp-util');
var bower = require('bower');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var minifyCss = require('gulp-clean-css');
var rename = require('gulp-rename');
var sh = require('shelljs');
var uglify = require('gulp-uglify');
var gutil = require('gulp-util');

var rev = require("gulp-rev");

gulp.task('scss', function() {
    return gulp.src([
          'resources/assets/scss/*.scss',
        ])
        .pipe(sass())
        .on('error', sass.logError)
        .pipe(concat('app.css'))
        .pipe(minifyCss())
        .pipe(rename('app.min.css'))
        .pipe(gulp.dest('public/css/'));
});

// Concatenate & Minify JS
gulp.task('js', function() {
    return gulp.src([
            'resources/assets/js/app.js',
            'resources/assets/js/**/*.js'
        ])
        .pipe(concat('app.js'))
        .pipe(gulp.dest('public/js/'))
        .pipe(uglify())
        .on('error', gutil.log)
        .pipe(rename('app.min.js'))
        .pipe(gulp.dest('public/js/'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('resources/assets/js/**/*.js', ['js']);
    gulp.watch('resources/assets/scss/*.scss', ['scss']);
});

// Default Task
gulp.task('default', ['scss','js', 'watch']);

gulp.task('install', ['git-check'], function() {
  return bower.commands.install()
    .on('log', function(data) {
      gutil.log('bower', gutil.colors.cyan(data.id), data.message);
    });
});

gulp.task('git-check', function(done) {
  if (!sh.which('git')) {
    console.log(
      '  ' + gutil.colors.red('Git is not installed.'),
      '\n  Git, the version control system, is required to download Ionic.',
      '\n  Download git here:', gutil.colors.cyan('http://git-scm.com/downloads') + '.',
      '\n  Once git is installed, run \'' + gutil.colors.cyan('gulp install') + '\' again.'
    );
    process.exit(1);
  }
  done();
});

gulp.task("revision", function(){
  return gulp.src([
      "public/css/app.min.css",
      "public/js/app.min.js",
      "public/js/app-template.js",
    ],{base: 'public'})
    .pipe(rev())
    .pipe(gulp.dest("public"))
    .pipe(rev.manifest())
    .pipe(gulp.dest("public/build/"))
})
