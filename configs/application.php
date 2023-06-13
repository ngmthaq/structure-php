<?php

define("STT_OK", 200);
define("STT_NO_CONTENT", 204);
define("STT_BAD_REQUEST", 400);
define("STT_UNAUTHORIZED", 401);
define("STT_FORBIDDEN", 403);
define("STT_NOT_FOUND", 404);
define("STT_METHOD_NOT_ALLOWED", 405);
define("STT_UNSUPPORTED_MEDIA_TYPE", 415);
define("STT_UNPROCESSABLE_CONTENT", 422);
define("STT_TOO_MANY_REQUEST", 429);
define("STT_INTERNAL_SERVER_ERROR", 500);
define("STT_SERVICE_UNAVAILABLE", 503);
define("STT_TIMEOUT", 504);

define("METHOD_GET", "get");
define("METHOD_POST", "post");

define("LOG_STATUS_INFO", "INFO");
define("LOG_STATUS_ERROR", "ERROR");

define("GLOBALS_DATABASE", "database");

define("KEY_CSRF_TOKEN", "csrf-token");
define("KEY_AUTH_TOKEN", "auth-token");
define("KEY_FLASH_MESSAGE", "flash-message");

define("TEMPLATE_AUTH_TOKEN", ":token");
