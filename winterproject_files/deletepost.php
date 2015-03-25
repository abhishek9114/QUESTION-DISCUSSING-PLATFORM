<?php
include 'connect_inc.php';
$id=$_REQUEST['id_value'];
$userid=$_REQUEST['userid'];
$query = "DELETE FROM `newposts` WHERE `pocm_id` = '$id' ";
if($query_run = mysql_query($query))
{
    echo "<script> alert('Post Deleted'); </script>";
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