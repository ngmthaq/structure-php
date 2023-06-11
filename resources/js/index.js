import { $$ } from "./utils.js";
import "../scss/index.scss";

const language = window.navigator.language.split("-");
const html = $$("html");

html.setAttribute("lang", language[0]);
