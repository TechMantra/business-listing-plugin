const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require('path');

module.exports = {
    ...defaultConfig,
    entry: {
        'index': './blocks/src/index.js',
    },
    output: {
        path: path.resolve(__dirname, 'blocks/build'),
        filename: '[name].js',
    },
};
