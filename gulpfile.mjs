"use strict";

// Initialize modules
import gulp from 'gulp';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';

// Importing all the Gulp-related packages we want to use
import sourcemaps from 'gulp-sourcemaps';
import babel from 'gulp-babel';
import minifyjs from 'gulp-uglify-es';
import autoPrefixer from 'gulp-autoprefixer';
import plumber from 'gulp-plumber';
import concat from 'gulp-concat';
import merge from 'merge2';

// Importing specific gulp API functions lets us write them below as series() instead of gulp.series()
const {src, dest, watch, series, parallel} = gulp;

// Setting up Sass (connecting Dart Sass)
// sass.compiler = require('sass');
const sass = gulpSass(dartSass);

const
  jsWatch = [
      './assets/js/app.js'
  ],
  jsFiles = [
      './assets/js/app.js',
      './assets/js/*.js',
      '!./assets/js/*.min.js',
  ],
  cssWatch = [
      './assets/scss/*.scss',
      './assets/scss/layout/*.scss',
      './assets/scss/admin_menu/*.scss',
  ],
  cssFiles = [
      './assets/scss/app.scss',
  ];

// Sass task: compiles the style.scss file into style.css
function scssTask() {

    const cssBackFiles = src(cssFiles, {base: './'})
      .pipe(autoPrefixer({
          cascade: false
      }))
      .pipe(plumber())
      .pipe(sourcemaps.init())
      .pipe(sass({
          outputStyle: 'compressed'
      }))
      .pipe(concat('app.min.css'))
      .pipe(sourcemaps.write('.'))
      .pipe(dest('./assets/scss/'));

    return merge(cssBackFiles);

}

// JS Task: minify scripts
function jsTask() {
    const jsBackFiles = src(jsFiles, {base: './'})
      .pipe(babel({
          presets: [
              ['@babel/env', {
                  modules: 'commonjs'
              }]
          ]
      }))
      // .pipe(minifyjs())
      .pipe(minifyjs.default())
      .pipe(concat('app.min.js'))
      .pipe(dest('./assets/js/'));

    return merge(jsBackFiles);

}

// Watch task: watch SCSS and JS files for changes
// If any change, run scss and js tasks simultaneously
function watchTask() {
    watch([...cssWatch, ...jsWatch], series(parallel(scssTask, jsTask)));
}

// Export the default Gulp task, so it can be run
// Runs the scss and js tasks simultaneously
// then runs cacheBust, then watch task
export default series(
  parallel(scssTask, jsTask),
  watchTask
);
