import { $$ } from "./utils.js";
import "../scss/page.error.scss";

const messageElement = $$("#error_message");
const errorMessage = messageElement.getAttribute("data-message");
console.error(errorMessage);
