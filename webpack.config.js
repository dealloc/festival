var path = require( 'path' );
var webpack = require( 'webpack' );
var env = process.env.NODE_ENV || 'production';

let config = {
	entry  : [ path.resolve( 'resources/assets/js/app.js' ) ],
	output : {
		path    : path.resolve( 'public/js' ),
		filename: "app.js"
	},
	module : {
		loaders: [
			{
				test   : /\.jsx?$/,
				exclude: /(node_modules|bower_components)/,
				loader : 'babel',
				query  : {
					presets: [ 'es2015' ]
				}
			},
			{
				test   : /\.vue$/,
				exclude: /(node_modules|bower_components)/,
				loader : 'vue'
			}
		]
	},
	resolve: {
		root      : [ path.resolve( 'resources/assets/js' ) ],
		alias     : {
			vue: path.resolve( 'resources/assets/vue' )
		},
		extensions: [ '', '.js' ]
	}
};

if (env !== 'dev')
{
	config['plugins'] = [
		// short-circuits all Vue.js warning code
		new webpack.DefinePlugin( {
			'process.env': {
				NODE_ENV: '"production"'
			}
		} ),
		// minify with dead-code elimination
		new webpack.optimize.UglifyJsPlugin( {
			compress: {
				warnings: false
			}
		} ),
		// optimize module ids by occurence count
		new webpack.optimize.OccurenceOrderPlugin()
	];
}

module.exports = config;