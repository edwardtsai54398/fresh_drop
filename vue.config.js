const { defineConfig } = require("@vue/cli-service");
const path = require("path");
module.exports = defineConfig({
    transpileDependencies: true,
    css: {
        sourceMap: true,
    },
    pluginOptions: {
        "style-resources-loader": {
            preProcessor: "scss",
            patterns: [path.resolve(__dirname, "./src/assets/scss/all.scss")],
        },
    },
    pwa: {
        iconPaths: {
            favicon32: 'favicon.ico',
            favicon16: 'favicon.ico',
            appleTouchIcon: 'favicon.ico',
            maskIcon: 'favicon.ico',
            msTileImage: 'favicon.ico'
    
        }
    },
    // devServer: {
    //     proxy: {
    //         "/api_server": {
    //           // 本地端測試用路徑
    //             target: "http://localhost/fresh_drop_vue/public/phps/",
    //             changeOrigin: true,
    //             pathRewrite: {
    //                 "^/api_server": "",
    //             },
    //         },
    //     },
    // },
    publicPath: process.env.NODE_ENV === "production" ? "/chd102/g2/" : "/",
});


// module.exports = {
//     publicPath: process.env.NODE_ENV === 'production'
//      ? "/chd102/g2/front/"
//       : "/",
// };
