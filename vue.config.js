const { defineConfig } = require('@vue/cli-service')
const path = require('path');
module.exports = defineConfig({
  transpileDependencies: true,

  pluginOptions: {
    'style-resources-loader': {
      preProcessor: 'scss',
      patterns: [
        path.resolve(__dirname, './src/assets/scss/all.scss'),
      ]
    }
  }
})
<<<<<<< HEAD
=======

// module.exports = {
//     publicPath: process.env.NODE_ENV === 'production'
//      ? "/chd102/g2/front/" 
//       : "/",
// };
>>>>>>> 93a802dfc34664ae741cd8383064854206eba246
