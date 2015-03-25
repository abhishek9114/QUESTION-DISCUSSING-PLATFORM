<?php
$errormsg = "";
  require 'connect_inc.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$us_id = $_SESSION['us_id'];
if(isset($_GET['addfriend']))
{
   //
   //unset($_GET['addfriend']);
$username = $_GET['username'];
$userid = $_GET['userid'];
//echo $_GET['addfriend'];
//echo  $username;
$qwery = " INSERT INTO `friendrequests`  VALUES('','$us_id','$userid','1') ";
$qwery_run = mysql_query($qwery);
if($qwery_run)
{
     $errormsg = 'your friend request has been sent';
}
else
{
     $errormsg = 'friend request cannot be sent';
}
}
else {
     if(isset($_GET['username']))
     {
         $username = $_GET['username'];
         $userid = $_GET['userid'];
     }
    
}
header("Location:profileinfo.php?username=$username&userid=$userid&errormsg=$errormsg");