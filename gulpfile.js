const elixir = require('laravel-elixir');

require('laravel-elixir-vue');
require('laravel-elixir-ts');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .webpack('app.js')
        .copy('node_modules/@angular', 'public/js/@angular')
        .copy('node_modules/anular2-in-memory-web-api', 'public/js/anular2-in-memory-web-api')
        .copy('node_modules/core-js', 'public/js/core-js')
        .copy('node_modules/reflect-metadata', 'public/js/reflect-metadata')
        .copy('node_modules/systemjs', 'public/js/systemjs')
        .copy('node_modules/rxjs', 'public/js/rxjs')
        .copy('node_modules/zone.js', 'public/js/zone.js')

    .typescript("resources/assets/typescript/", "public/app", {
        "target": "es5",
        "module": "commonjs",
        "moduleResolution": "node",
        "sourceMap": true,
        "emitDecoratorMetadata": true,
        "experimentalDecorators": true,
        "lib": ["es2017", "dom"],
        "removeComments": false,
        "noImplicitAny": false,
    });
});



// const gulp = require('gulp');
// // const del = require('del');
// const typescript = require('gulp-typescript');
// const tscConfig = require('./tsconfig.json');

// clean the contents of the distribution directory
// gulp.task('clean', function () {
//   return del('dist/**/*');
// });

// TypeScript compile
/*gulp.task('compile', function () {
  return gulp
    .src('resources/assets/typescript/*.ts')
    .pipe(typescript(tscConfig.compilerOptions))
    .pipe(gulp.dest('public/app'));
});

gulp.task('build', ['compile']);
gulp.task('default', ['build']);*/