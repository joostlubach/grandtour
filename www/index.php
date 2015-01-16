<?php

define('ROOT_PATH', dirname(__FILE__) . '/..');

require_once ROOT_PATH . '/vendor/autoload.php';
$loader = new Twig_Loader_Filesystem(ROOT_PATH . '/twig');

$twig = new Twig_Environment($loader);

$path = preg_replace('|^(?:/.*?\.php)(.*)$|', '$1', $_SERVER['REQUEST_URI']);

try {
  echo $twig->render("/pages$path.twig");
} catch (Twig_Error_Loader $ex) {
  http_response_code(404);
  echo "Template pages/$path not found";
}

?>