<?php
function chechkandshowprofilepic()
{
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
