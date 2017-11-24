<?php

require_once(__DIR__ . '/config/global.php');
function __autoload($className){
  require_once(__DIR__ . '/classes/' . $className . '.php');
}

$db = Database::getConnection();

$email = "zrider99zr@gmail.com";

$sql = "SELECT firstName FROM account";
$qry = $db->query($sql);

if($qry->num_rows >= 1){
  $result = $qry->get_result();
  echo "Salt ", $result[0]['firstName'];
}
else{
  echo "<br /> Bad query";
}


 ?>
