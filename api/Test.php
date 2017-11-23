<?php
require_once(__DIR__ . '/config/global.php');
function __autoload($className){
  require_once(__DIR__ . '/classes/' . $className . '.php');
}

$db = Database::getConnection();
$test = new Test($dbc);

foreach ($_POST as $key => $value) {
  $$key = trim($val);
  echo $val;
}

 ?>
