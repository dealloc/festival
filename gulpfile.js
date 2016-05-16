var gulp = require( 'gulp' );
var webpack = require( 'webpack-stream' );
var webpack_config = require( './webpack.config.js' );

gulp.task( 'default', function ()
{
	return gulp.src( 'src/entry.js' )
		.pipe( webpack( webpack_config ) )
		.pipe( gulp.dest( webpack_config.output.path ) );
} );