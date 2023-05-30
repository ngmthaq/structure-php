const path = require("path");

module.exports = {
  devtool: "inline-source-map",
  entry: "./resources/ts/main.ts",
  output: {
    filename: "main.bundle.js",
    path: path.resolve(__dirname, "./public/bundles"),
  },
  resolve: {
    extensions: [".tsx", ".ts", ".js"],
  },
  module: {
    rules: [
      {
        test: /\.tsx?$/,
        use: "ts-loader",
        exclude: /node_modules/,
      },
    ],
  },
};
