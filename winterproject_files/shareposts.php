<?php
include 'connect_inc.php';
function shareposts($us_share)
{ 
    if(!isset($_SESSION))
    {
        session_start();
    }
  $us_id = $_SESSION['us_id'];
      $query2 = "INSERT into `newposts` VALUES ('','$us_id','$us_share','".date("Y-m-d")."') ";
    if( $query_run = mysql_query($query2))
    {
        echo "<script> alert('Successfully Posted'); </script>";
        ?>
<a href= "afterlogin.php"><strong>Go Back</strong></a>
     <?php
    }
      
}
?>
