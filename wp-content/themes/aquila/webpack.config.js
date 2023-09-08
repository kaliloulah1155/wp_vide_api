const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const cssnano = require('cssnano');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const DependencyExtractionWebpackPlugin = require( '@wordpress/dependency-extraction-webpack-plugin' );


// Directory paths
const JS_DIR = path.resolve(__dirname, 'assets/src/js');
const IMG_DIR = path.resolve(__dirname, 'assets/src/img');    // attention les images vont dans assets/src/img
const BUILD_DIR = path.resolve(__dirname, 'assets/build');
const LIB_DIR = path.resolve(__dirname, 'assets/src/library');


const entry = {
	main: [path.join(JS_DIR, 'main.js')],
	single:path.join(JS_DIR, 'single.js'),
	editor:path.join(JS_DIR, 'editor.js'),
	blocks:path.join(JS_DIR, 'editor.js'),
};

const output = {
	path: BUILD_DIR,
	filename: 'js/[name].js',

};

const plugins = (argv) => [
	new CleanWebpackPlugin({
		cleanStaleWebpackAssets: argv.mode === 'production',
	}),

	new MiniCssExtractPlugin({
		filename: 'css/[name].css',
	}),
	new CopyPlugin({
		patterns: [
			{ from: LIB_DIR,to:BUILD_DIR+'/library' }
			],
	}),
	new DependencyExtractionWebpackPlugin( {
		injectPolyfill: true,
		combineAssets:true
	} ),
];

const rules = [
	{
		test: /\.js$/,
		include: [JS_DIR],
		exclude: /node_modules/,
		use: 'babel-loader',
	},
	{
		test: /\.scss$/,
		exclude: /node_modules/,
		use: [
			MiniCssExtractPlugin.loader,
 			'css-loader',   // Convert CSS into CommonJS
			'sass-loader'   // Compile Sass to CSS
		],


	},
	{
		test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
		use: {
			loader: 'file-loader',
			options: {
				name: '[path][name].[ext]',
				publicPath: process.env.NODE_ENV === 'production' ? '../' : '../../',
			},
		},
	},
];

module.exports = (env, argv) => ({
	entry: entry,
	output: output,
	devtool: 'source-map',
	module: {
		rules: rules,
	},
	optimization: {
		minimizer: [
			new OptimizeCssAssetsPlugin({
				cssProcessor: cssnano,
			}),
			new UglifyJsPlugin({
				cache: false,
				parallel: true,
				sourceMap: false,
			}),
		],
	},
	plugins: plugins(argv),
	externals: {
		jquery: 'jQuery',
	},
});

