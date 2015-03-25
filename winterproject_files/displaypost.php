<?php
//include 'chechklikes.php';
ob_start();
include 'connect_inc.php';
include 'postpictureshow.php';
//session_start();
//
//include 'postcomment.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$us_id = $_SESSION['us_id'];
$select_query = "SELECT * FROM  `postscomment` ORDER BY `pocm_dt` DESC ";
$sql = mysql_query($select_query) or die(mysql_error());
$query_num_rows =  mysql_num_rows($sql);
if($query_num_rows == 0)
{
    echo 'No posts to display';
}
else
{
//$query_result = mysql_result($sql,0,'us_pl');
while($row = mysql_fetch_assoc($sql)){
    //echo $row['pocm_id'].'<br>';
    $_SESSION['pocm_id'] = $row['pocm_id'];
   // echo $_SESSION[$pocm_id];
    $pocm_id = $row['pocm_id'];
    $pocm_ub = $row['pocm_ub'];
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
     echo 'This post is posted by ';
     ?> <a href = 'profileinfo.php?username=<?php echo $a;?>&userid=<?php echo $b; ?>'><?php echo $ans; ?> </a>
     <?php
     echo '<br>';
    echo $row['pocm_cp'].'<br>';
    postpictureshow($row['pocm_id']);
    ?>
<form action = "postcomment.php" method = "GET">
    <table>
        <tr><td colspan =2><input type = "submit" value = "Like" name = "like_submit"/></td></tr>
    <tr><td colspan =2><textarea rows = "4" cols = "30"  name = 'pocm_cm'></textarea/></td></tr>
    <tr><td colspan =2><input type = 'submit' value = 'comment'/></td></tr>
    <tr><td colspan = 2><input type = 'hidden' value = "<?php echo $pocm_id ; ?>" name = 'id_value'>
    </table>
</form>
<?php
$query1 = "SELECT `cm_cm`, `cm_ub`  FROM `comments` WHERE `cm_co` = '$pocm_id' ";
$query_run = mysql_query($query1);
while($row1 = mysql_fetch_assoc($query_run))
{
    $cmid = $row1['cm_ub'];
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
   echo 'commented by';
   ?> <a href = 'profileinfo.php?username=<?php echo $a;?>&userid=<?php echo $b; ?>'><?php echo ''.$pore.'<br>'; ?></a>
   <?php
   echo $row1['cm_cm'].'<br>'; 
}
}
}
//header('Location: profiletable.php');
?>



