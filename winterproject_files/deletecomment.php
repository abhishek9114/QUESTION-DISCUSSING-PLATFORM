<?php
include 'connect_inc.php';
$id=$_REQUEST['comment_id'];
$userid=$_REQUEST['userid'];
$username=$_REQUEST['username'];
$query = "DELETE FROM `newpostscomment` WHERE `cm_id` = '$id' ";
if($query_run = mysql_query($query))
{
    echo "<script> alert('Comment Deleted'); </script>";
    ?>
<a href="userposts.php?userid=<?php echo $userid; ?>&username=<?php echo $username; ?>"><strong>Go Back</strong></a>
<?php
}
else
{
 echo "<script> alert('Please Try Later'); </script>";
     ?>
<a href="userposts.php?userid=<?php echo $userid; ?>&username=<?php echo $username; ?>"><strong>Go Back</strong></a>
<?php
}
?>
