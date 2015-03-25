<a href = 'index.php'>Home</a>
<br><br><br><br>
<?php

if(isset($_REQUEST['contact_name'])&&isset($_REQUEST['contact_email'])&&isset($_REQUEST['contact_text']))
{
   $contact_name = $_REQUEST['contact_name'];
   $contact_email = $_REQUEST['contact_email'];
   $contact_text  = $_REQUEST['contact_text'];
   if(!empty($contact_name)&&!empty($contact_email)&&!empty($contact_text))
   {
       if(strlen($contact_name)>25 || strlen($contact_email)>50 || strlen($contact_text)>1000)
       {
            echo 'sorry! you have exceeded some fields limit Please try again';       
       }
       else
       {
       $to = 'abhishek9114@gmail.com';
       $subject = 'Contact Form Submission';
       $body = $contact_name."\n"."contact_text";
       //$headers = 'From: someone@gmail.com';
       //$headers = 'From: myschool<someone@gmail.com>';
       $headers = 'From: '.$contact_email;
       if(@mail($to,$subject,$body,$headers))
       {
           echo 'Thanks For Contacting me ';
           ?>
<a href ='profile.php'>Home</a>
<?php
           
       }
       else
       {
           echo 'Please Contact me later';
       }
   }
   }
   else
   {
       echo 'Fill in All Fields';
   }
}
?>
<body bgcolor = 'navyblue'>
<form action = "contactme.php" method = "POST">
    <table align ='center'>
        <tr><td colspan ='2'>Name:<br><input type = "text" name = "contact_name" maxlength="25"value=" <?php if(isset($contact_name)){ echo $contact_name;}?>"><br><br></td></tr>
        <tr><td colspan ='2'>Email address:<br><input type = "text" name = "contact_email" maxlength="50" value ="<?php if(isset($contact_email)){ echo $contact_email;} ?>" ></td></tr><br><br>
        <tr><td colspan ='2'>Message:<br>
                <textarea name = "contact_text" rows = "15" cols = "70" maxlength="1000"></textarea></td></tr><br><br>
        <tr><td colspan ='2'><input type = "submit" value = "Send"></td></tr>
    </table>
</form> 
</body>