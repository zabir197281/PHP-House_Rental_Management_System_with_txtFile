<?php
session_start();

if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes")
{
  
?>



<!DOCTYPE html>
<html>
<head>


</head>
<body>
<p><h2>Admin Page:</h2></p>

<p>
    
  <form action="admin.php" method="post">
    <strong>User List:</strong>
     <select  style="width: 100%; padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
     box-sizing: border-box;"
id="utist" name="ulist">
      <option value="RentTaker">Rent Taker</option>
      <option value="RentGiver">Rent Giver</option>
      


    </select>

<strong>Search User(User Name):</strong>

 <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" name="uname" placeholder="User Name...">
    <h2>
     
     <input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;float: left;" type="submit"  name="search" value="search"><br><br><br>


     <input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;float: left;" type="submit"  name="showall" value="Show All"><br><br><br>




  </form> 
   
  


</p>



<p>
<table style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;">
  <tr>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Name :</th>


    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">User Name: </th>
    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Phone </th>
    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Email</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Gender</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Occupation</th>


  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Type</th>




  </tr>

<?php


if(isset($_POST["search"]) &&   $_POST["ulist"]== "RentTaker" )

{

$file=fopen("RentTakerInfo.txt", "r");
$data=array();
$cd=array();

while ($c=fgets($file)) {


  $ar=explode("-",$c);
    
    if (isset($ar[0]) && isset($ar[1]) && isset($ar[2]) && isset($ar[3]) && isset($ar[4]) && isset($ar[5]) && isset($ar[6]) && isset($ar[7]) && isset($ar[8])   ) {
  
   
    $cd["fname"]=$ar[0];
    $cd["lname"]=$ar[1];
    $cd["uname"]=$ar[2];
    $cd["phon"]=$ar[3];
    $cd["email"]=$ar[4];
    $cd["gender"]=$ar[6];
    $cd["occupation"]=$ar[7];
    $cd["utype"]=$ar[8];
    

    $data[]=$cd;

      }

}




  $i=0;

global $data;
foreach ($data as  $v) 
{
 global $data;
if ($_POST["uname"] == $v["uname"]  )
 {
  
 global $i;
 $i++;

?>











  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v["fname"] ."  ". $v["lname"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["uname"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["phon"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["email"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["gender"];   ?></td>

     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["occupation"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["utype"];   ?></td>
     

  


  </tr>


<?php 
           }





        }

        if ($i==0) 
        {
          echo "<h3 style='color:red;text-align:center';>No match found !!!</h3>";
        }

       }

    ?>








<?php


if(isset($_POST["search"]) &&   $_POST["ulist"]== "RentGiver" )

{

$file=fopen("RentGiverInfo.txt", "r");
$data=array();
$cd=array();

while ($c=fgets($file)) {


  $ar=explode("-",$c);
    
    if (isset($ar[0]) && isset($ar[1]) && isset($ar[2]) && isset($ar[3]) && isset($ar[4]) && isset($ar[5]) && isset($ar[6]) && isset($ar[7]) && isset($ar[8])   ) {
  
   
    $cd["fname"]=$ar[0];
    $cd["lname"]=$ar[1];
    $cd["uname"]=$ar[2];
    $cd["phon"]=$ar[3];
    $cd["email"]=$ar[4];
    $cd["gender"]=$ar[6];
    $cd["occupation"]=$ar[7];
    $cd["utype"]=$ar[8];
    

    $data[]=$cd;

      }

}




  $i=0;

global $data;
foreach ($data as  $v) 
{
 global $data;
if ($_POST["uname"] == $v["uname"]  )
 {
  
 global $i;
 $i++;

?>











  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v["fname"] ."  ". $v["lname"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["uname"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["phon"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["email"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["gender"];   ?></td>

     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["occupation"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["utype"];   ?></td>
     

  


  </tr>


<?php 
           }





        }

        if ($i==0) 
        {
          echo "<h3 style='color:red;text-align:center';>No match found !!!</h3>";
        }

       }

    ?>




<?php


if(isset($_POST["showall"]) &&   $_POST["ulist"]== "RentGiver" )

{

$file=fopen("RentGiverInfo.txt", "r");
$data=array();
$cd=array();

while ($c=fgets($file)) {


  $ar=explode("-",$c);
    
    if (isset($ar[0]) && isset($ar[1]) && isset($ar[2]) && isset($ar[3]) && isset($ar[4]) && isset($ar[5]) && isset($ar[6]) && isset($ar[7]) && isset($ar[8])   ) {
  
   
    $cd["fname"]=$ar[0];
    $cd["lname"]=$ar[1];
    $cd["uname"]=$ar[2];
    $cd["phon"]=$ar[3];
    $cd["email"]=$ar[4];
    $cd["gender"]=$ar[6];
    $cd["occupation"]=$ar[7];
    $cd["utype"]=$ar[8];
    

    $data[]=$cd;

      }

}




  $i=0;

global $data;
foreach ($data as  $v) 
{
 global $data;


?>











  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v["fname"] ."  ". $v["lname"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["uname"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["phon"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["email"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["gender"];   ?></td>

     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["occupation"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["utype"];   ?></td>
     

  


  </tr>


<?php 
           





        }

        

       }

    ?>



<?php


if(isset($_POST["showall"])  &&   $_POST["ulist"] == "RentTaker" )

{

$file=fopen("RentTakerInfo.txt", "r");
$data=array();
$cd=array();

while ($c=fgets($file)) {


  $ar=explode("-",$c);
    
    if (isset($ar[0]) && isset($ar[1]) && isset($ar[2]) && isset($ar[3]) && isset($ar[4]) && isset($ar[5]) && isset($ar[6]) && isset($ar[7]) && isset($ar[8])   ) {
  
   
    $cd["fname"]=$ar[0];
    $cd["lname"]=$ar[1];
    $cd["uname"]=$ar[2];
    $cd["phon"]=$ar[3];
    $cd["email"]=$ar[4];
    $cd["gender"]=$ar[6];
    $cd["occupation"]=$ar[7];
    $cd["utype"]=$ar[8];
    

    $data[]=$cd;

      }

}




  $i=0;

global $data;
foreach ($data as  $v) 
{
 global $data;


?>











  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v["fname"] ."  ". $v["lname"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["uname"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["phon"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["email"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["gender"];   ?></td>

     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["occupation"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["utype"];   ?></td>
     

  


  </tr>


<?php 
           





        }

        

       }

    ?>


<?php


if(   !(isset($_POST["showall"]) ||  isset($_POST["search"]) )  ) 

{

$file=fopen("RentTakerInfo.txt", "r");
$data=array();
$cd=array();

while ($c=fgets($file)) {


  $ar=explode("-",$c);
    
    if (isset($ar[0]) && isset($ar[1]) && isset($ar[2]) && isset($ar[3]) && isset($ar[4]) && isset($ar[5]) && isset($ar[6]) && isset($ar[7]) && isset($ar[8])   ) {
  
   
    $cd["fname"]=$ar[0];
    $cd["lname"]=$ar[1];
    $cd["uname"]=$ar[2];
    $cd["phon"]=$ar[3];
    $cd["email"]=$ar[4];
    $cd["gender"]=$ar[6];
    $cd["occupation"]=$ar[7];
    $cd["utype"]=$ar[8];
    

    $data[]=$cd;

      }

}




  $i=0;

global $data;
foreach ($data as  $v) 
{
 global $data;


?>











  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v["fname"] ."  ". $v["lname"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["uname"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["phon"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["email"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["gender"];   ?></td>

     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["occupation"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["utype"];   ?></td>
     

  


  </tr>


<?php 
           





        }

        

       }

    ?>













































 
</table>
</p>

 <a href="addadmin.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Add admin</a><br><br><br>




<a href="Logout.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Logeout</a><br><br><br>




</body>
</html>



<?php




 }



?>