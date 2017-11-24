<?php
require_once('base.php');
echo $session->register($email,$firstName, $lastName, $password,$isClient,$isAdmin,$institutionID);
