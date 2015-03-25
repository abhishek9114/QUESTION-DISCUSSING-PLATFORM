<html>
    <body  style ='background-color:  #f1c40f'>
<?php
include("connect_inc.php");
session_start();
    function GetImageExtension($file_name)
   	 {
      $ext = strtolower(substr($file_name, strpos($file_name,'.')+1)); 
      return $ext;
     }
      
/*<?php
    function GetImageExtension($imagetype)
    {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }

     }
?>*/
	$max_size = 100000; 
if (!empty($_FILES["uploadedimage"]["name"]))
    {
	 $file_name=$_FILES["uploadedimage"]["name"];
	 $temp_name=$_FILES["uploadedimage"]["tmp_name"];
	 $imgtype=$_FILES["uploadedimage"]["type"];
         $img_size =$_FILES["uploadedimage"]["size"];
	 $ext= GetImageExtension($file_name);
          $imagename=date("d-m-Y")."-".time().'.'.$ext;
	$target_path = "uploadedimage/".$imagename;
       // echo $target_path;
       $us_id = $_SESSION['us_id'];
        if(isset($_REQUEST['p_cp']))
        {
        $p_cp = $_REQUEST['p_cp'];
        }
        else
        {
            $p_cp ='';
        }
        //echo $p_cp;
       // echo $ext;
        if (($ext != "jpg") && ($ext != "jpeg") && ($ext != "png") 
		&& ($ext != "gif")&& ($ext!= "JPG") && ($ext != "JPEG") 
		&& ($ext!= "PNG") && ($ext!= "GIF")) 
	{
		echo '<h3>Unknown extension!</h3>';
		//$errors=1;
	}
else
{
  // echo 'hello';
   //echo $img_size;
    if($img_size<=$max_size)
    {
if(move_uploaded_file($temp_name, $target_path))
                {
     $query = "UPDATE `users` SET `us_pl` = '$target_path' WHERE `us_id` = '$us_id' ";
 	//$query = "INSERT into `photo` VALUES ('','$us_id','$p_cp','".$target_path."','".date("Y-m-d")."') ";
	if($query_run = mysql_query($query))
        {
            echo 'Uploaded Successfully';
           
           // $query2 = "INSERT into `postscomment` VALUES ('','".$target_path."','".date("Y-m-d")."','$us_id','$p_cp') ";
         // $query_run2 = mysql_query($query2);
            if(mysql_query($query))
           {   
          $_SESSION['us_pl'] = $target_path;
                        }
            ?>
<a href = 'index.php'>Go Back</a>
<?php
        }
        else die();  
	
                }
else 
    {
   exit("Error While uploading image on the server");
     } 
     }
else
{
    echo 'file size must be 1 mb or less';
}
}
}
?>
 
<form action="editprofilepic.php" enctype="multipart/form-data" method="post">
<table style="border-collapse: collapse; font: 12px Tahoma; " border="1" cellspacing="5" cellpadding="5" align = 'center' >
<tbody>
    <tr><td><input name="uploadedimage" type="file"></td></tr>
    <tr><td><textarea rows ="6" cols="30" name = "p_cp" placeholder = 'Add any caption to it...'></textarea></td></tr>
    <tr><td><input name="Upload Now" type="submit" value="Upload Image"></td></tr>
</tbody>
</table>
</form>
    </body></html>