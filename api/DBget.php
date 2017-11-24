<?php

require_once(__DIR__ . '/config/global.php');
function __autoload($className){
  require_once(__DIR__ . '/classes/' . $className . '.php');
}

$db = Database::getConnection();

$email = "zrider99zr@gmail.com";

$sql = "SELECT * FROM account";
$qry = $db->query($sql);

if($qry->num_rows >= 1){
  while($row = $result->fetch_assoc()) {
        echo "Salt ", $row['salt'], "<br /> Hash ", $row['hash'];
  }

}
else{
  echo "<br /> Bad query";
}


 ?>
