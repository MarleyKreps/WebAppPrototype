<?php
class Test {
  private static $self_instance;
  private $mysqli; //reference to the database
  public $sid; //session ID

  public function __construct($dbc){
    $this->mysqli = $dbc;

        //Determines if the user has a session id set
    $this->sid = isset($_SESSION['sid']) ? $_SESSION['sid'] : null;
    if ($this->sid != null) {
      //Sets the current loggedIn status and validates any session in the browser
      $this->validate($this->sid, time());
    }
  }

  public function __destruct() {

  }

  public static function getInstance($dbc){
    if(!self::$self_instance){
      self::$self_instance = new Session($dbc);
    }
    return self::$self_instance;
  }

  public function registerAccount($email, $firstName, $lastName, $password){
    //TODO sanitize inputs; ensure email is an email, ensure password doesn't have weird characters\
    //TODO solve institution picking problem (see TODO 2.2.1.3)


    $salt = random_bytes(32); //create salt for account
    $saltedPassword = $salt.$password;
    $hash = hash('scrypt',$saltedPassword);
    $qry = $this->mysqli->prepare("INSERT INTO account(emailAddress,firstName,lastName,hash,salt) VALUES(?,?,?)");
    $qry->bind_param("sssss",$email,$firstName,$lastName,$hash,$salt);
    $qry->execute();
    //Get the institutionID for the insert into clientAccount
    $incrementID = $qry->insert_id;
    //If the created account is a client account create a client account

    $this-registerSystemAccount($incrementID);
    $qry->close();
    return 1;

  }
  //Returns the institutionID for this user
  function getInstitutionID(){
    $uid = getUID($this->sid);
    $qry = $this->mysqli->prepare("SELECT institutionID from clientAccount where accountID =  ?");
    $qry->bind_param("i",$uid);
    $qry->execute();
    $result = $qry->get_result();
    $qry->close();
    return isset($result[0]['institutionID']) ? $result[0]['institutionID'] : -1;
  }

  function registerSystemAccount($accountID){
    $qry = $this->mysqli->prepare("INSERT INTO systemAdmin VALUES(?)");
    $qry->bind_param("iii",$accountID);
    $qry->execute();
    $qry->close();
  }


  function registerClientAccount($accountID, $institutionID, $isAdmin){
    //Insert into client account
    $qry = $this->mysqli->prepare("INSERT INTO clientAccount VALUES(?,?,?)");
    $qry->bind_param("iii",$accountID,$institutionID,$isAdmin);
    $qry->execute();
    $qry->close();
  }


}
?>
