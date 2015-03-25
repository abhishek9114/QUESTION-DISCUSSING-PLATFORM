<?php 
include 'connect_inc.php';
//session_start();
function postpictureshow($field)
{
   // echo 'kilo';
  $query = "SELECT `pocm_pl` FROM `postscomment` WHERE `pocm_id` = '$field' ";
  $query_run = mysql_query($query);
  $query_result = mysql_result($query_run, 0, `pocm_pl`);
  // $num_rows = mysql_num_rows($query_run);

     // echo 'hellomr';
      if($query_result == "notuploaded")
      {
          //echo 'hello ';
          return ;
      }
 else 
     {
     ?>
      <img src = "<?php echo $query_result ; ?>">
      <?php
      return;
      }
  }
?>