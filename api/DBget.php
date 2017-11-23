<?php

require_once(__DIR__ . '/config/global.php');
function __autoload($className){
  require_once(__DIR__ . '/classes/' . $className . '.php');
}

$db = Database::getConnection();

$email = "zrider99zr@gmail.com";

echo $email;

$qry = $db->prepare("SELECT * FROM corstrata.systemAdmin");
if($qry->execute()){
  echo "Success";
}
if($qry->num_rows >= 1){
  $result = $qry->get_result();
  echo "Salt ", $result[0]['salt'], "<br /> Hash ", $result[0]['hash'];
}
else{
  echo "<br /> Bad query";
}


 ?>
