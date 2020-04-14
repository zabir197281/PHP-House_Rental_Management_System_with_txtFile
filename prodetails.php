<!DOCTYPE html>
<html>
<head>
	<title>Details page</title>
	<h2 style="color:blue;">Property Details:</h2>
</head>
<body >

<div style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">




  



<?php
//print_r($GLOBALS);
session_start();
$file=fopen("PropertyInfo.txt", "r");
$data=array();


while ($c=fgets($file)) {
 
 

     $ar=explode("-",$c);
    
   if (isset($ar[0]) && isset($ar[1]) && isset($ar[2]) && isset($ar[3]) && isset($ar[4]) && isset($ar[5]) && isset($ar[6]) && isset($ar[7]) && isset($ar[8]) ) {
       
 

      
if ($_GET["d"] == $ar[0]) 
{
	

?>

  <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; text-align: left;"> <spen style="color:green;">Rent Giver Username:</spen>  <?php  echo $ar[0]; ?></h3>
  
  <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;"> Price: </spen><?php   echo $ar[1];  ?></h3>

  <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;"> Phone:</spen> <?php  echo $ar[2];  ?></h3>
   
  <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;"> Email: </spen><?php   echo $ar[3]; ?></h3>

   <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;"> Area:  </spen><?php  echo $ar[4];  ?></h3>

  <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;">Address</spen> <?php  echo $ar[5];  ?></h3>

   <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"><spen style="color:green;">Number Of Rooms:</spen> <?php  echo $ar[6];  ?></h3>

  <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"><spen style="color:green;">Size:</spen>  <?php  echo $ar[7];  ?></h3>

   <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;"> Floor:</spen>  <?php  echo $ar[8];  ?></h3>
                     

         
  <a href="rentgiver.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Back</a><br><br><br>


<?php   
                  
                  break;  


      
  }
      
    
}
   

     }


?>

















</div>
</body>
</html>