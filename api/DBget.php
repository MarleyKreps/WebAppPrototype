<?php

require_once(__DIR__ . '/config/global.php');
function __autoload($className){
  require_once(__DIR__ . '/classes/' . $className . '.php');
}

$db = Database::getConnection();

$email = "zrider99zr@gmail.com";

$sql = "SELECT salt, hash FROM account WHERE email = " . $email;
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "salt: " . $row["salt"]. " - hash: " . $row["hash"]. "<br>";
    }
} else {
    echo "0 results";
}


 ?>
