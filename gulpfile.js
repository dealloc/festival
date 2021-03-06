var gulp = require('gulp');
var manifest = require('gulp-manifest');
var webpack = require('webpack-stream');
var webpack_config = require('./webpack.config.js');
var plumber = require('gulp-plumber');
var swPrecache = require('sw-precache');
var path = require('path');

let dev_mode = (process.argv.indexOf('--dev') !== -1);
if (dev_mode)
{
	console.log('[GULP]: running in development mode!');
}

gulp.task('manifest', function(callback) {
	var root = 'public';

	swPrecache.write(path.join(root, 'cacher.min.js'), {
		staticFileGlobs: dev_mode ? [] : [root + '/**/*.{js,html,css,png,jpg,gif,svg,eot,ttf,woff}'],
		stripPrefix: root
	}, callback);
});

gulp.task('vendor', function ()
{
	gulp.src('node_modules/jquery/dist/jquery.min.js')
		.pipe(gulp.dest('public/vendor/jquery/dist'));
	gulp.src('node_modules/semantic-ui/dist/semantic.min.js')
		.pipe(gulp.dest('public/vendor/semantic/dist'));
});

gulp.task('webpack', function ()
{
	return gulp.src('src/entry.js')
		.pipe(plumber())
		.pipe(webpack(webpack_config))
		.pipe(gulp.dest(webpack_config.output.path));
});

gulp.task('webpack-watch', ['build'], function ()
{
	let watch_config = webpack_config;
	watch_config.watch = true;

	return gulp.src('src/entry.js')
		.pipe(plumber())
		.pipe(webpack(watch_config))
		.pipe(gulp.dest(webpack_config.output.path));
});

gulp.task('build', ['webpack', 'build-css', 'semantic-assets', 'vendor'], function()
{
	gulp.start('manifest');
});

gulp.task('build-css', require('./node_modules/semantic-ui/tasks/build/css'));
gulp.task('semantic-assets', require('./node_modules/semantic-ui/tasks/build/assets'));
gulp.task('semantic-watch', ['build'], require('./node_modules/semantic-ui/tasks/watch'));
gulp.task('watch', ['webpack-watch', 'semantic-watch']);
gulp.task('default', ['build']);
