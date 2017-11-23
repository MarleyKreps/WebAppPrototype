<?php
require_once(__DIR__ . '/config/global.php');
function __autoload($className){
  require_once(__DIR__ . '/classes/' . $className . '.php');
}

$db = Database::getConnection();

$email = "zrider99zr@gmail.com"

echo $email;

$qry = $db->prepare("SELECT salt, hash FROM account WHERE emailAddress = ?")
$qry->bind_param("s",$email);
$qry->execute();
$qry->bind_result($dbSalt,$dbHash);
$qry->store_result();

echo "Salt ", $dbSalt, "<br /> Hash " $dbHash;


 ?>
