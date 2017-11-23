<?php
require_once(__DIR__ . '/config/global.php');
function __autoload($className){
  require_once(__DIR__ . '/classes/' . $className . '.php');
}



$db = Database::getConnection();
$test = new Test($dbc);

foreach ($_POST as $key => $value) {
  $$key = trim($val);
}

$salt = random_bytes(32); //create salt for account
$saltedPassword = $salt.$password;
$hash = hash('scrypt',$saltedPassword);
$qry = $this->db->prepare("INSERT INTO account(emailAddress,firstName,lastName,hash,salt) VALUES(?,?,?)");
$qry->bind_param("sssss",$email,$firstName,$lastName,$hash,$salt);  $qry->execute();
//Get the institutionID for the insert into clientAccount
$incrementID = $qry->insert_id;
//If the created account is a client account create a client account

$qry->close();
$qry = $this->db->prepare("INSERT INTO systemAdmin VALUES(?)");
$qry->bind_param("iii",$accountID);
$qry->execute();
$qry->close();


 ?>
