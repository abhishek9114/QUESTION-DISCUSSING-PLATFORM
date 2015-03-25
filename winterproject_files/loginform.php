<?php
if(!loggedin())
{
if (isset($_REQUEST['us_un'])&&isset($_REQUEST['us_p']))
{
    $us_un=$_REQUEST['us_un'];
     $us_p=$_REQUEST['us_p'];
    //echo '<br>';
    $us_ph = md5($us_p);
    if(!empty($us_un)&&!empty($us_p))
    {  
        $us_un = mysql_real_escape_string($us_un);
     echo $query = "SELECT `us_id` FROM `users` WHERE `us_un` REGEXP '$us_un' AND `us_p` = '$us_ph' ";
    if( $query_run = mysql_query($query))
    {
       // echo 'muio';
         $query_num_rows = mysql_num_rows($query_run);
        if( $query_num_rows == 0)
            {
         //   echo 'hello mer';
        echo 'Invalid Username/password Combination';
            }
        else if( $query_num_rows == 1)
        {
         //   echo 'hello';
         $us_id = mysql_result($query_run,0,'us_id');
         $_SESSION['us_id'] = $us_id;
         if($us_un=='admin'&&$us_ph='d81f9c1be2e08964bf9f24b15f0e4900')
         {
            header('Location: newstartadmin.php');  
         }
         else
         {
         header('Location: afterposts.php');
         }
        }
    }
    }
    else
    {
        echo "supply username and password";
    }
}
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    </head>
    <body>
<form class="form-inline" action = "<?php echo $current_file ?>" method ="POST"> 
  <div class="form-group col-md-5">
    <label class="sr-only" for="exampleInputEmail2">Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail2" name = "us_un" placeholder="Username">
  </div>
    <div class="form-group col-md-5">
    <label class="sr-only" for="exampleInputEmail2">Email address</label>
    <input type="password" class="form-control"  name = "us_p" id="exampleInputEmail2" name = "us_un" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default col-md-2">Log in</button>
    <!--<table align = "right" vertical-align = "top" >
        <tr><td>Username: <input type="text" name = "us_un" placeholder= "username" /> Password: <input type="password" name = "us_p"/>            <input type = "submit" value = "Login"/></td></tr>
    </table>-->
</form>
</body>
</html>
<?php
}
else if(loggedin())
{
    if(!isset($_SESSION))
    {
        session_start();
    }
    $id=$_SESSION['us_id'];
    $puery="SELECT * FROM `users` WHERE `us_id`='$id' ";
    $puery_run = mysql_query($puery);
     while($row = mysql_fetch_assoc($puery_run))
     {
         $ch_un= $row['us_un'];
         $ch_up=$row['us_p'];
     }
     if($ch_un=='admin'&&$ch_up=='d81f9c1be2e08964bf9f24b15f0e4900')
     {
          echo 'You are logged in.<a href = "newstartadmin.php"> Go to Your Users Page</a>';
     }
     else{
 echo 'You are logged in.<a href = "afterposts.php"> Go to HomePage</a>';
     }
 die();
}

?>