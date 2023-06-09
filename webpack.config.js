import path from "path";
import { fileURLToPath } from "url";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

export default {
  devtool: "inline-source-map",
  entry: {
    index: "./resources/js/index.js",
    error: "./resources/js/page.error.js",
    home: "./resources/js/page.home.js",
  },
  output: {
    filename: "[name].bundle.js",
    path: path.resolve(__dirname, "./public/bundles"),
    clean: true,
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
      {
        test: /\.s[ac]ss$/i,
        use: ["style-loader", "css-loader", "sass-loader"],
      },
    ],
  },
};
