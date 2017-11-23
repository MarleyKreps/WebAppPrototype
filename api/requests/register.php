<?php
require_once('base.php');
echo $session->register($email,$password,$isClient,$isAdmin,$institutionID);
