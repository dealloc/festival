var gulp = require( 'gulp' );
var webpack = require( 'webpack-stream' );
var webpack_config = require( './webpack.config.js' );

gulp.task( 'webpack', function ()
{
	return gulp.src( 'src/entry.js' )
		.pipe( webpack( webpack_config ) )
		.pipe( gulp.dest( webpack_config.output.path ) );
} );

gulp.task( 'build', [ 'webpack' ] );

gulp.task( 'watch', [ 'build' ], function()
{
	let watch_config = webpack_config;
	watch_config.watch = true;

	return gulp.src( 'src/entry.js' )
		.pipe( webpack( watch_config ) )
		.pipe( gulp.dest( webpack_config.output.path ) );
});

gulp.task( 'default', [ 'build' ] );