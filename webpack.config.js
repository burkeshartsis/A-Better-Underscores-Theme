var ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = [{
  name: 'js',
  context: __dirname,
  entry: {
    main: [
      "./index.js"
    ]
  },

  output: {
    filename: "bundle.js",
    path: __dirname
  },
  devtool: 'source-map',
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader',
        query: {
          presets: ['es2015']
        }
      }
    ]
  }
},
{
  name: 'css',
  context: __dirname,
  entry: {
    styles: [
      './sass/style.scss'
    ]
  },

  output: {
    filename: "style.css",
    path: __dirname
  },
  
  devtool: 'source-map',
  module: {
    loaders: [
      {
          test: /\.scss$/,
          loader: ExtractTextPlugin.extract('css!sass')
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin('style.css', {
        allChunks: true
    })
  ]
}]