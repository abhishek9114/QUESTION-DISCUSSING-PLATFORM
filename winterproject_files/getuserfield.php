
<?php
//session_start();
//require 'connect_inc.php';
//echo $_SESSION['us_id'];
function getuserfield($field)
{
   // echo $field;
$session = $_SESSION ['us_id'];
    
    $query = "SELECT `$field` FROM `users` WHERE `us_id` = '$session' ";
   // echo $query;
     $query_run = mysql_query($query);
    // echo $query_run;
    if($query_run)
    {
        //echo 'hello';
        if($query_result = mysql_result($query_run,0,$field))
        {
          // echo $query_result;
                return $query_result;
        }
    }
}
?>
