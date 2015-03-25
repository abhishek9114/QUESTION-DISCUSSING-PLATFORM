<?php
//$current_file = $_SERVER['SCRIPT_NAME']
function loggedin()
{
    if(isset($_SESSION['us_id'])&&!empty($_SESSION['us_id']))
{
    return true;
}
else
{
  return false;
}
}
?>