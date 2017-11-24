<?php

require_once(__DIR__ . '/config/global.php');
function __autoload($className){
  require_once(__DIR__ . '/classes/' . $className . '.php');
}

$db = Database::getConnection();

$email = "zrider99zr@gmail.com";

if ($qry = $db->prepare("SELECT hash, salt FROM account WHERE email=?")) {

    /* bind parameters for markers */
    $qry->bind_param("s", $email);

    /* execute query */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($hash, $salt);

    /* fetch value */
    $stmt->fetch();

    echo "salt: " . $salt . " - hash: " . $hash . "<br>";

    /* close statement */
    $stmt->close();
}


 ?>
