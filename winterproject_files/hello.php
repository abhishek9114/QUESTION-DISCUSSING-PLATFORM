<?php
if(!isset($_SESSION))
{
    session_start();
}
function normal()
{
    if(!isset($_SESSION))
{
    session_start();
}
 //This gets today's date 
 date_default_timezone_set('Asia/Calcutta');
 $date =time () ; 

 //This puts the day, month, and year in seperate variables 

$day = date('d', $date) ; 

 $month = date('m', $date) ; 

 $year = date('Y', $date) ;
 $_SESSION['s_day']=intval($day);
 $_SESSION['s_month']=intval($month);
 $_SESSION['s_year']=intval($year);
  //$day =4;
 //$month =5;
 //$year = 2015;
 //Here we generate the first day of the month 

 $first_day = mktime(0,0,0,$month, 1, $year) ; 



 //This gets us the month name 

 $title = date('F', $first_day) ;

 //Here we find out what day of the week the first day of the month falls on 
 $day_of_week = date('D', $first_day) ; 



 //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero

 switch($day_of_week){ 

 case "Sun": $blank = 0; break; 

 case "Mon": $blank = 1; break; 

 case "Tue": $blank = 2; break; 

 case "Wed": $blank = 3; break; 

 case "Thu": $blank = 4; break; 

 case "Fri": $blank = 5; break; 

 case "Sat": $blank = 6; break; 

 }



 //We then determine how many days are in the current month

 $days_in_month = cal_days_in_month(0, $month, $year) ; 

 //Here we start building the table heads 

 echo "<table border=1 width=294 style='padding-left:20px;'>";
?>
<tr><th colspan=7><p><span style="padding-left:40px;"><a href="index.php?name=<?php echo 'prev';?>&month=<?php echo $month;?>&year=<?php echo $year;?>" >Prev</a> </span>
<span style="text-align:center;padding-left:20px;"><?php echo "$title $year" ;?></span><span style="text-align:right;padding-left:20px;">
<a href="index.php?name=<?php echo 'next';?>&month=<?php echo $month;?>&year=<?php echo $year;?>" style="text-align:right;">Next</a>
 </span> </p></th></tr>
<?php
 echo "<tr><td width=42>S</td><td width=42>M</td><td 
width=42>T</td><td width=42>W</td><td width=42>T</td><td 
width=42>F</td><td width=42>S</td></tr>";



 //This counts the days in the week, up to 7

 $day_count = 1;



 echo "<tr>";

 //first we take care of those blank days

 while ( $blank > 0 ) 

 { 

 echo "<td></td>"; 

 $blank = $blank-1; 

 $day_count++;

 } 

 //sets the first day of the month to 1 

 $day_num = 1;



 //count up the days, untill we've done all of them in the month

 while ( $day_num <= $days_in_month ) 

 {
     if($day_num==$day)
     {
        echo "<td><strong> <font color='blue'>$day_num </font></strong> </td>";  
     }
else
{
 echo "<td> $day_num </td>"; 
}

 $day_num++; 

 $day_count++;



 //Make sure we start a new row every week

 if ($day_count > 7)

 {

 echo "</tr><tr>";

 $day_count = 1;

 }

 } 

 //Finaly we finish out the table with some blank details if needed

 while ( $day_count >1 && $day_count <=7 ) 

 { 

 echo "<td> </td>"; 

 $day_count++; 

 } 

 
 echo "</tr></table>"; 
}
function abnormal()
{
    if(!isset($_SESSION))
{
    session_start();
}
    $f_day=$_SESSION['s_day'];
    $f_month=$_SESSION['s_month'];
    $f_year = $_SESSION['s_year'];
 //This gets today's date 
 date_default_timezone_set('Asia/Calcutta');
 $date =time () ; 
  $name=$_REQUEST['name'];
// echo'start';
if($name=='prev')
{
  // echo 'prev';
     $month=intval($_REQUEST['month']);
    //$year=;
   $year=intval($_REQUEST['year']);
 //echo 'ended';
    if($month==1)
    {
        $month=12;
        $year=$year-1;
    }
 else {
       $month=$month-1;
       $year=$year;
    }
}
 if($name=='next')
{
    // echo 'next';
    $month=intval($_REQUEST['month']);
     $year=intval($_REQUEST['year']); 
   //echo 'end';
    if($month==12)
    {
        $month=1;
        $year=$year+1;
    }
    else
    {
        $month=$month+1;
        $year=$year;
    }
}

$f=0;
 //This puts the day, month, and year in seperate variables 
if($month==$f_month&&$year==$f_year)
{
    $f=1;
}
//$day = date('d', $date) ; 

 //$month = date('m', $date) ; 

 //$year = date('Y', $date) ;
 //Here we generate the first day of the month 

 $first_day = mktime(0,0,0,$month, 1, $year) ; 



 //This gets us the month name 

 $title = date('F', $first_day) ;

 //Here we find out what day of the week the first day of the month falls on 
 $day_of_week = date('D', $first_day) ; 



 //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero

 switch($day_of_week){ 

 case "Sun": $blank = 0; break; 

 case "Mon": $blank = 1; break; 

 case "Tue": $blank = 2; break; 

 case "Wed": $blank = 3; break; 

 case "Thu": $blank = 4; break; 

 case "Fri": $blank = 5; break; 

 case "Sat": $blank = 6; break; 

 }



 //We then determine how many days are in the current month

 $days_in_month = cal_days_in_month(0, $month, $year) ; 

 //Here we start building the table heads 

 echo "<table border=1 width=294 style='padding-left:20px;'>";

?>
<tr><th colspan=7><p><span style="padding-left:40px;"><a href="index.php?name=<?php echo 'prev';?>&month=<?php echo $month;?>&year=<?php echo $year;?>" >Prev</a> </span>
<span style="text-align:center;padding-left:20px;"><?php echo "$title $year" ;?></span><span style="text-align:right;padding-left:20px;">
<a href="index.php?name=<?php echo 'next';?>&month=<?php echo $month;?>&year=<?php echo $year;?>" style="text-align:right;">Next</a>
 </span> </p>
        </th></tr>
<?php
 echo "<tr><td width=42>S</td><td width=42>M</td><td 
width=42>T</td><td width=42>W</td><td width=42>T</td><td 
width=42>F</td><td width=42>S</td></tr>";



 //This counts the days in the week, up to 7

 $day_count = 1;



 echo "<tr>";

 //first we take care of those blank days

 while ( $blank > 0 ) 

 { 

 echo "<td></td>"; 

 $blank = $blank-1; 

 $day_count++;

 } 

 //sets the first day of the month to 1 

 $day_num = 1;



 //count up the days, untill we've done all of them in the month

 while ( $day_num <= $days_in_month ) 

 {
     if($f==1&&$day_num==$f_day)
     {
   echo "<td><strong> $day_num </strong> </td>";
     }
else
{
 echo "<td> $day_num </td>"; 
}

 $day_num++; 

 $day_count++;



 //Make sure we start a new row every week

 if ($day_count > 7)

 {

 echo "</tr><tr>";

 $day_count = 1;

 }

 } 

 //Finaly we finish out the table with some blank details if needed

 while ( $day_count >1 && $day_count <=7 ) 

 { 

 echo "<td> </td>"; 

 $day_count++; 

 } 

 
 echo "</tr></table>"; 
}
 ?>
<?php
if(isset($_REQUEST['name'])=='prev'||isset($_REQUEST['name'])=='next')
{
    abnormal();
}
else
{
    normal();
}
?>


