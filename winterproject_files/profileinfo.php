<html>
    <head>
        <title>ProfileInfo</title>    
    </head>
    <body bgcolor = "#3498db">        
        <?php
        require 'connect_inc.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$us_id = $_SESSION['us_id'];
if(isset($_GET['username'])&&isset($_GET['userid']))
{
   //
   //unset($_GET['addfriend']);
$username = $_GET['username'];
$userid = $_GET['userid'];
/*header('Location:profileinfo.php?username=<?php echo $username;?>&userid=<?php echo $userid;?>');*/
}
//echo 'nothing to display now';
?>
<?php
//include 'profileinfoeditfunction.php'
//$username = 

 $query = "SELECT * FROM `users` WHERE `us_un` REGEXP '$username' ";
$query_run =  mysql_query($query);
 $us_fn = mysql_result($query_run, 0, 'us_fn');
 $us_ln = mysql_result($query_run, 0, 'us_ln');
 $space = ' ';
 $us_name1 = $us_fn.$space.$us_ln;
 //$us_name = $us_name1;
 $us_un = $username;
 $us_cn = mysql_result($query_run, 0, 'us_cn');
 $us_ei = mysql_result($query_run, 0, 'us_ei');
 $us_s =  mysql_result($query_run, 0, 'us_s');
 $us_in = mysql_result($query_run, 0, 'us_in');
 $us_pl = mysql_result($query_run, 0, 'us_pl');
 //$u=2;
 ?>
<table align = "center" align  width = 1000 >
    <tr><td width = 300><?php include 'chechkandshowprofilepic.php'; chechkandshowprofilepic1($username); ?>
        </td>
        <td width = 700>
            <table align = 'center' >
                <tr><td colspan = 2></td></tr>
                <tr><td colspan = 2></td></tr>
                <tr><td colspan = 2></td></tr>
                <tr><td colspan = 2></td></tr>
                <tr><td colspan = 2>Name = <?php echo $us_name1 ; ?></td></tr>
                <tr><td colspan = 2>Contact Number = <?php echo $us_cn ; ?></td></tr>
                <tr><td colspan = 2>Email-id = <?php echo $us_ei ; ?></td></tr>
                <tr><td colspan =2>Sex = <?php echo $us_s; ?></td></tr>
                <tr><td colspan = 2>Intersted In = <?php echo $us_in ; ?></td></tr>
                <tr><td align = 'right' ><a href = 'afterlogin.php' > Home </a></td>
          <td colspan ='2' align ='right'><a href = 'logout.php'>Logout</a>
                </tr>
            </table>
        </td>
    </tr>
</table>
    </body>
</html>