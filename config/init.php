<?php

define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("CORE", ROOT . '/core');
define("LIBS", ROOT . '/core/libs');
define("CONF", ROOT . '/config');
define("APP", ROOT . '/app');
define("VIEWS", APP . '/views');

require_once ROOT . '/vendor/autoload.php';

function dd($data){
    highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
    die();
}