<?php
require_once('./database.php');

$db_conn = new Database();
//echo '123';
if (!array_key_exists('url', $_GET)) {
    $_GET['url'] = '';
}
$url = $_GET['url'];
$params = explode('/', $url);
if (!$params[0]) {
    $params[0] = 'main';
}
if (!file_exists($params[0] . '.php')) {
    echo "Sorry, wrong routes";
    exit();
}
require_once($params[0] . '.php');

$controller = new $params[0]($db_conn);

if (array_key_exists(1, $params)) {
    $method = $params[1] . 'Method';
} else {
    $method = 'defaultMethod';
}

$controller->$method();

exit();