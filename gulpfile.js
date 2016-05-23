var gulp = require('gulp');
var manifest = require('gulp-manifest');
var webpack = require('webpack-stream');
var webpack_config = require('./webpack.config.js');

if ((process.argv.indexOf('--dev') !== -1))
{
	console.log('[GULP]: running in development mode!');
}

gulp.task('manifest', function ()
{
	let sources = ((process.argv.indexOf('--dev') !== -1) ? '' : 'public/**/+(*.min.*|*.woff2)');
	gulp.src(sources)
		.pipe(manifest({
			hash: true,
			filename: 'application.manifest'
		}))
		.pipe(gulp.dest('public/'));
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
		.pipe(webpack(webpack_config))
		.pipe(gulp.dest(webpack_config.output.path));
});

gulp.task('webpack-watch', ['build'], function ()
{
	let watch_config = webpack_config;
	watch_config.watch = true;

	return gulp.src('src/entry.js')
		.pipe(webpack(watch_config))
		.pipe(gulp.dest(webpack_config.output.path));
});

gulp.task('semantic', require('./node_modules/semantic-ui/tasks/build/css'));
gulp.task('semantic-assets', require('./node_modules/semantic-ui/tasks/build/assets'));
gulp.task('semantic-watch', ['build'], require('./node_modules/semantic-ui/tasks/watch'));
gulp.task('build', ['webpack', 'semantic', 'semantic-assets', 'vendor', 'manifest']);
gulp.task('watch', ['webpack-watch', 'semantic-watch']);
gulp.task('default', ['build']);
