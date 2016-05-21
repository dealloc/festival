var gulp = require( 'gulp' );
var webpack = require( 'webpack-stream' );
var webpack_config = require( './webpack.config.js' );

if ( (process.argv.indexOf( '--dev' ) !== -1) )
{
	process.env.NODE_ENV = 'dev';
	console.log('[GULP]: running in development mode!');
}

gulp.task( 'webpack', function ()
{
	return gulp.src( 'src/entry.js' )
		.pipe( webpack( webpack_config ) )
		.pipe( gulp.dest( webpack_config.output.path ) );
} );

gulp.task( 'webpack-watch', [ 'build' ], function ()
{
	let watch_config = webpack_config;
	watch_config.watch = true;

	return gulp.src( 'src/entry.js' )
		.pipe( webpack( watch_config ) )
		.pipe( gulp.dest( webpack_config.output.path ) );
} );

gulp.task( 'semantic', require( './node_modules/semantic-ui/tasks/build' ) );

gulp.task( 'semantic-watch', [ 'build' ], require( './node_modules/semantic-ui/tasks/watch' ) );

gulp.task( 'build', [ 'webpack', 'semantic' ] );

gulp.task( 'watch', [ 'webpack-watch', 'semantic-watch' ] );

gulp.task( 'default', [ 'build' ] );
