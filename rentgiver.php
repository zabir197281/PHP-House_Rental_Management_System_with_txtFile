

<?php
session_start();

if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes")
{
  
?>



<!DOCTYPE html>
<html>
<head>

<p><h2>Welcome to Rent Giver Paage </h2></p><br>

</head>
<body>






<p>
	<h3 style="color: blue;">Houses That are up for rent:</h3>
<table style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;">
  <tr>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Rentgiver Username</th>


    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Price(TK) </th>
    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Area</th>
    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Address</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Number Of Room</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Size(Sq)</th>



  </tr>

<?php
$file=fopen("PropertyInfo.txt", "r");
$data=array();
$cd=array();

while ($c=fgets($file)) {


  $ar=explode("-",$c);
    
    if (isset($ar[0]) && isset($ar[1]) && isset($ar[2]) && isset($ar[3]) && isset($ar[4]) && isset($ar[5]) && isset($ar[6]) && isset($ar[7]) && isset($ar[8])  ) {
  
   
    $cd["runame"]=$ar[0];
    $cd["price"]=$ar[1];
    $cd["area"]=$ar[4];
    $cd["address"]=$ar[5];
    $cd["numofroom"]=$ar[6];
    $cd["size"]=$ar[7];
    

    $data[]=$cd;

      }

}



foreach ($data as  $v) 
{
 
?>











  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v["runame"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["price"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["area"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["address"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["numofroom"];   ?></td>
      <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["size"];   ?></td>
     


  </tr>


<?php 
           }

    $_SESSION["uname"]=$_SESSION["uname"];



?>

  
 









 
</table>
</p>


<a href="addpro.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Insert Property</a><br><br><br>



<a href="Logout.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Logeout</a><br><br><br>

<a href="changeProInfo.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Chsnge Property Info</a><br><br><br>




</body>
</html>



<?php




}




?>