<?php
function chechkandshowprofilepic()
{
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$us_id = $_SESSION['us_id'];
$query = "SELECT `us_pl` FROM `users` WHERE `us_id` = '$us_id' ";
$image = 'profilepic.jpg';
//echo $image;
$query_run = mysql_query($query);
if($query_run)
{
    if($query_result = mysql_result($query_run,0,'us_pl'))
    {
        if($query_result == "notuploaded")
        {
           ?>
<img src = "profilepic.jpg">
<?php
        }
        else
        {
            ?>
        <img src= " <?php echo $query_result; ?> ">
        <?php
          //$new = substr($file_name, strpos($file_name,'.')+1);
        }
    }
}
}
?>
<?php
function chechkandshowprofilepic1($username)
{
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$us_id = $_SESSION['us_id'];
$query = "SELECT `us_pl` FROM `users` WHERE `us_un` REGEXP '$username' ";
$image = 'profilepic.jpg';
//echo $image;
$query_run = mysql_query($query);
if($query_run)
{
    if($query_result = mysql_result($query_run,0,'us_pl'))
    {
        if($query_result == "notuploaded")
        {
           ?>
<img src = "profilepic.jpg">
<?php
        }
        else
        {
            ?>
        <img src= " <?php echo $query_result; ?> ">
        <?php
          //$new = substr($file_name, strpos($file_name,'.')+1);
        }
    }
}
}
?>
<?php
function chechkandshowprofilepic2($username,$userid)
{
    //echo $username;
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$us_id = $_SESSION['us_id'];
 $query = "SELECT `us_pl` FROM `users` WHERE `us_un` REGEXP '$username' ";
$image = 'profilepic.jpg';
//echo $image;
$query_run = mysql_query($query);
if($query_run)
{
    if($query_result = mysql_result($query_run,0,'us_pl'))
    {
        if($query_result == "notuploaded")
        {
           ?>
        <img src = "profilepic.jpg">
        <a href ="profileinfo.php?username=<?php echo $username; ?> & userid=<?php echo $userid; ?>"><?php echo $username ?></a><br>
<?php
        }
        else
        {
            ?>
            <img src= " <?php echo $query_result; ?> "><a href ="profileinfo.php?username=<?php echo $username; ?>&userid=<?php echo $userid;?>"> <?php echo $username ?></a><br>
        <?php
          //$new = substr($file_name, strpos($file_name,'.')+1);
        }
    }
}
}
?>


