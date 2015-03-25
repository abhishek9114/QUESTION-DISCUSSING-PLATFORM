<?php
include 'header1.php';
?>
<?php
include 'connect_inc.php';
if(isset($_REQUEST['us_sn'])&&!empty($_REQUEST['us_sn']))
{
    $us_sn = $_REQUEST['us_sn'];
    $query = "SELECT `us_un` ,`us_id` FROM `users` WHERE `us_un` LIKE '%".mysql_real_escape_string($us_sn)."%'";
    $query_run = mysql_query($query);
    $query_num_rows = mysql_num_rows($query_run);
    if($query_num_rows >=1)
    {
        echo $query_num_rows.' '.'Results found.'.'<br>';
        while($query_row = mysql_fetch_assoc($query_run))
        {
            ?>
<?php
$a = $query_row['us_un'];
$b = $query_row['us_id'];?>
<a href = 'profileinfo.php?username=<?php echo $a;?>&userid=<?php echo $b; ?>'><?php echo $query_row['us_un'].'<br>'; ?></a>
<?php
        }
    }
    else
    {
        echo 'No results found';
    }
    
}
?>