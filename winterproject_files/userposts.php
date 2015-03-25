<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body style="background-color: #E9F2F9">


<?php
include 'header1.php';
//include 'chechklikes.php';
ob_start();
include 'connect_inc.php';
//session_start();
//
//include 'postcomment.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$us_id = $_REQUEST['userid'];
$us_name=$_REQUEST['username'];
$select_query = "SELECT * FROM  `newposts`  WHERE `pocm_ub`='$us_id' ORDER BY `pocm_dt` DESC ";
$sql = mysql_query($select_query) or die(mysql_error());
$query_num_rows =  mysql_num_rows($sql);
//echo $query_num_rows;
if($query_num_rows == 0)
{
    echo '<strong>This user have not posted anything yet</strong>';
}
else
{
//$query_result = mysql_result($sql,0,'us_pl');
echo '<div class="container"><div class="row"><div class="col-md-offset-2">';
while($row = mysql_fetch_assoc($sql)){
    //echo $row['pocm_id'].'<br>';
    //$_SESSION['pocm_id'] = $row['pocm_id'];
   // echo $_SESSION[$pocm_id];
    $pocm_id = $row['pocm_id'];
    $pocm_ub = $us_id;
    $qry = "SELECT `us_fn` FROM `users` WHERE `us_id` = '$pocm_ub' ";
    $qry1 = "SELECT `us_ln` FROM `users` WHERE `us_id` = '$pocm_ub' ";
    $qry5 = "SELECT `us_un` FROM `users` WHERE `us_id` = '$pocm_ub' ";
    $query_run5 = mysql_query($qry5);
    $a= mysql_result($query_run5, 0, `us_un`);
    $b=$pocm_id;
    $qry_run =mysql_query($qry);
     $qry1_run =mysql_query($qry1);
     $qry_result = mysql_result($qry_run,0, `us_fn`);
     $qry1_result = mysql_result($qry1_run,0, `us_ln`);
     $spaceit = ' ';
     $ans = $qry_result.$spaceit.$qry1_result;
     ?> <div class="row"><strong>This Question is posted by <a href = 'profileinfo.php?username=<?php echo $a;?>&userid=<?php echo $b; ?>'><?php echo $ans; ?> </a></strong></div>
     <?php
     echo '<br>';
    echo '<strong>Question:</strong>'.$row['pocm_cp'];
   // postpictureshow($row['pocm_id']);
    ?>
<form action = 'deletepost.php' method = 'GET'>
    <table>
    <tr><td colspan =2><input type = 'submit' value = 'Delete'/></td></tr>
    <tr><td colspan = 2><input type = 'hidden' value = "<?php echo $pocm_id ; ?>" name = 'id_value'>
            <tr><td colspan = 2><input type = 'hidden' value = '<?php echo $us_id ; ?>' name = 'userid'>
                    <tr><td colspan = 2><input type = 'hidden' value = '<?php echo $us_name ; ?>' name = 'username'>
    </table>
</form>
<?php
$query1 = "SELECT `cm_cm`, `cm_ub`,`cm_id`  FROM `newpostscomment` WHERE `cm_co` = '$pocm_id' ";
$query_run = mysql_query($query1);
//$query_num_rows = $query_run;
echo '<div class="container"><div class="row"><div class="col-md-offset-3">';
while($row1 = mysql_fetch_assoc($query_run))
{
    $cmid = $row1['cm_ub'];
    $cid=$row1['cm_id'];
    $query2 = "SELECT `us_fn` FROM `users` WHERE `us_id` = '$cmid' ";
    $query3 = "SELECT `us_ln` FROM `users` WHERE `us_id` = '$cmid' ";
    $query4 = "SELECT `us_un` FROM `users` WHERE `us_id` = '$cmid' ";
    $query_run4 = mysql_query($query4);
        $a = mysql_result($query_run4, 0,`us_un`);
            $b = $cmid;
    $query_run2 = mysql_query($query2);
    $query_run3 = mysql_query($query3);
    $query_result2 = mysql_result($query_run2, 0,`us_fn`);
    $query_result3 = mysql_result($query_run3, 0,`us_ln`);
    $space = ' ';
    //$a=
    $pore = $query_result2.$space.$query_result3;
   ?> <div class="row"><strong>Comment By </strong><a href = 'profileinfo.php?username=<?php echo $a;?>&userid=<?php echo $b; ?>'><?php echo ''.$pore.'<br>'; ?></a></strong></div>
   <?php
   echo $row1['cm_cm'].'<br>'; 
       ?>
<form action = "deletecomment.php" method = "GET">
    <table>
    <tr><td colspan =2><input type = 'submit' value = 'Delete'/></td></tr>
    <tr><td colspan = 2><input type = 'hidden' value = "<?php echo $cid ; ?>" name = 'comment_id'>
            <tr><td colspan = 2><input type = 'hidden' value = "<?php echo $us_id ; ?>" name = 'userid'>
                     <tr><td colspan = 2><input type = 'hidden' value = "<?php echo $us_name ; ?>" name = 'username'>
    </table>
</form>
<?php
}
echo '</div></div></div>';

}

echo '</div></div></div>';
}
//header('Location: profiletable.php');
?>
</body></html>



