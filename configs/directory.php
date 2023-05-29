<?php

define("DIR_CONFIGS", __DIR__);
define("DIR", str_replace(DIRECTORY_SEPARATOR . "configs", "", DIR_CONFIGS));
define("DIR_APP", DIR . DIRECTORY_SEPARATOR . "app");
define("DIR_CACHED", DIR . DIRECTORY_SEPARATOR . "cached");
define("DIR_PUBLIC", DIR . DIRECTORY_SEPARATOR . "public");
define("DIR_RESOURCES", DIR . DIRECTORY_SEPARATOR . "resources");
