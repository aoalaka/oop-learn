<?php

require_once 'Classes/Dbh.php';
require_once 'Classes/Signup.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    $signup = new Signup($uid, $pwd);


    $signup->signUpUser(); // Example call to inherited method
}