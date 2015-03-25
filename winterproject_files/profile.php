<?php
require 'loggedinfunc.php';
require 'connect_inc.php';
//session_start();
require 'getuserfield.php';
if(loggedin())
{
   // echo $_SESSION['us_id'];
   $us_fn = getuserfield('us_fn');
    $us_ln = getuserfield('us_ln');
    //echo 'hello';
    echo 'You are logged in'.' '.$us_fn.'  '.$us_ln.'  '.'<a href = "logout.php"> Logout </a>';
}
else
{
   include 'loginform.php'; 
}

