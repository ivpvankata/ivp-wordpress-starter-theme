const gulp = require('gulp');
const plumber = require('gulp-plumber');
const sass = require('gulp-sass')(require('sass'));
const inject = require('gulp-inject');
const concat = require('gulp-concat');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const browserSync = require('browser-sync').create();
const webpack = require('webpack-stream');
const { ProvidePlugin } = require('webpack');
const path = require('path');
const isProduction = process.env.NODE_ENV === 'production';
const del = (...args) =>
	import('del').then(({ deleteAsync }) => deleteAsync(...args));

async function clean() {
	await del(['../assets/dist/**/*'], { force: true });
}

function styles() {
	const scssFiles = gulp.src(['../assets/src/scss/**/_*.scss'], {
		read: false,
	});

	return gulp
		.src('../assets/src/scss/main.scss')
		.pipe(
			inject(scssFiles, {
				starttag: '// inject:scss',
				endtag: '// endinject',
				transform(filepath) {
					const cleanPath = filepath
						.replace(/^.*\/scss\//, '')
						.replace('_', '')
						.replace('.scss', '');

					return `@use '${cleanPath}';`;
				},
				relative: true,
			})
		)
		.pipe(!isProduction ? sourcemaps.init() : plumber())
		.pipe(sass().on('error', sass.logError))
		.pipe(postcss([autoprefixer()]))
		.pipe(concat('main.css'))
		.pipe(cleanCSS())
		.pipe(!isProduction ? sourcemaps.write('.') : plumber())
		.pipe(gulp.dest('../assets/dist'))
		.pipe(browserSync.stream({ match: '**/*.css' }));
}

function scripts() {
	return gulp
		.src('../assets/src/js/main.js')
		.pipe(
			plumber({
				errorHandler(error) {
					console.error('JS Build Error:', error.message || error);
					this.emit('end');
				},
			})
		)
		.pipe(
			webpack({
				mode: isProduction ? 'production' : 'development',

				devtool: isProduction ? false : 'source-map',
				output: { filename: 'main.js' },
				externals: { jquery: 'jQuery' },
				module: {
					rules: [
						{
							test: /\.js$/,
							exclude: /node_modules/,
							use: {
								loader: 'babel-loader',
								options: {
									presets: [
										[
											'@babel/preset-env',
											{
												targets:
													'defaults and not IE 11 and not OperaMini all',
												bugfixes: true,
												useBuiltIns: false,
												modules: false,
											},
										],
									],
								},
							},
						},
					],
				},
				plugins: [
					new ProvidePlugin({
						$: 'jquery',
						jQuery: 'jquery',
					}),
				],
			})
		)
		.pipe(gulp.dest('../assets/dist'))
		.pipe(browserSync.stream({ match: '**/*.js' }));
}

function watchFiles() {
	const options = {
		notify: true,
		open: false,
		https: false,
	};

	browserSync.init(options);

	gulp.watch('../assets/src/scss/**/*.scss', styles);
	gulp.watch('../assets/src/js/**/*.js', scripts);
	gulp.watch('../**/*.php').on('change', browserSync.reload);
}

exports.build = gulp.series(clean, gulp.parallel(styles, scripts));
exports.watch = gulp.series(exports.build, watchFiles);
