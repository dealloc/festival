var path = require( 'path' );

module.exports = {
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