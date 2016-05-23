var path = require( 'path' );
var webpack = require( 'webpack' );
var env = (process.argv.indexOf( '--dev' ) !== -1) ? 'dev' : 'production';

let config = {
	entry  : {
		app   : path.resolve( 'resources/assets/js/index.js' )
	},
	output : {
		path    : path.resolve( 'public/js' ),
		filename: "[name].min.js"
	},
	module : {
		loaders: [
			{
				test  : /\.jsx?$/,
				loader: 'babel',
				query : {
					presets: [ 'es2015' ]
				}
			},
			{
				test  : /\.vue$/,
				loader: 'vue'
			}
		]
	},
	resolve: {
		root      : [ path.resolve( 'resources/assets/js' ) ],
		alias     : {
			pages       : path.resolve( 'resources/assets/vue/pages' ),
			components  : path.resolve( 'resources/assets/vue/ui' ),
			vue         : path.resolve( 'node_modules/vue/src' ),
			vuex        : path.resolve( 'node_modules/vuex/src' ),
			'vue-router': path.resolve( 'node_modules/vue-router/src' )
		},
		extensions: [ '', '.js' ]
	},
	plugins: [
		new webpack.SourceMapDevToolPlugin( {} )
	]
};

if ( env !== 'dev' )
{
	config[ 'plugins' ] = [
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