<?php

require_once 'readenv.php';

(new DotEnv(__DIR__ . '/.env'))->load();

define("DB_HOST", getenv('DB_HOST'));
define("DB_USER", getenv('DB_USER'));
define("DB_PASS", getenv('DB_PASS'));
define("DB_DB",getenv('DB_DB'));
