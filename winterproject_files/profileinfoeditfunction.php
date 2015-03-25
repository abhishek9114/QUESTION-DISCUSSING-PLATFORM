
<?php
//session_start();
//require 'connect_inc.php';
//echo $_SESSION['us_id'];
function profileinfoeditfunction($field,$ans)
{
    //echo $field.'hello'.'<br>';
    //echo $ans.'<br>';
$session = $_SESSION ['us_id'];
    
    $query = "UPDATE `users`  SET `$field` = '$ans' WHERE `us_id` = '$session'  ";
   // echo $query;
    $query_run = mysql_query($query);
    // echo $query_run;
}
?>
