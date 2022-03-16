// webpack.config.js
var Encore = require('@symfony/webpack-encore');

Encore
  // quickfix, to investigate
  .disableSingleRuntimeChunk()

  // the project directory where all compiled assets will be stored
  .setOutputPath(Encore.isProduction() ? 'web/built/' : 'web/build')

  // the public path used by the web server to access the previous directory
  .setPublicPath(Encore.isProduction() ? '/built' : '/build')
  .setManifestKeyPrefix(Encore.isProduction() ? 'built' : 'build')

  // will create web/build/app.js and web/build/app.css
  .addEntry('app', './assets/js/app.js')

  // allow legacy applications to use $/jQuery as a global variable
  .autoProvidejQuery()

  // enable source maps during development
  .enableSourceMaps(!Encore.isProduction())

  // empty the outputPath dir before each build
  .cleanupOutputBeforeBuild()

  // show OS notifications when builds finish/fail
  // .enableBuildNotifications()

  // create hashed filenames (e.g. app.abc123.css)
  // .enableVersioning()

  // allow sass/scss files to be processed
  .enableSassLoader()
;

// export the final configuration
module.exports = Encore.getWebpackConfig();