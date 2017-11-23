<?php

session_start();
define('DB_HOST', '165.227.191.245');
define('DB_USER', 'project');
define('DB_PASS', 'drallen2001');
define('DB_NAME', 'corstrata');
define('SESSION_LENGTH', 60);

function __autoload($className){
  require_once(__DIR__ . '/classes/' . $className . '.php');
}


$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($db->connect_error) {
    echo $db->connect_error;
}

foreach ($_POST as $key => $value) {
  $$key = trim($value);
}



$salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
$options = [
    'cost' => 11,
    'salt' => $salt,
];
$hash = password_hash($password, PASSWORD_BCRYPT, $options);
echo  "Halt ", $salt , "<br> Hash " , $hash;

$qry = $db->prepare("INSERT INTO account(emailAddress,firstName,lastName,hash,salt) VALUES(?,?,?,?,?)");
$qry->bind_param("sssss",$email,$firstName,$lastName,$hash,$salt);
if($qry->execute()){
  echo "First query was successful";
}
else{
  echo "First query was unsuccessful";
}

/*
//Get the institutionID for the insert into clientAccount
$incrementID = $qry->insert_id;
//If the created account is a client account create a client account

$qry->close();
$qry = $this->db->prepare("INSERT INTO systemAdmin VALUES(?)");
$qry->bind_param("i",$incre);
$qry->execute();
$qry->close();

*/
 ?>
