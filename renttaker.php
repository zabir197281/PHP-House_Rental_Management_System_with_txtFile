
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
<p><h2>The list of rentable houses</h2></p>

<p>
    
  <form action="renttaker.php" method="post">
    <strong>Area:</strong>
     <select  style="width: 100%; padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
     box-sizing: border-box;"
id="area" name="area">
      <option value="Gulshan">Gulshan</option>
      <option value="Nayapolton">Nayapolton</option>
      <option value="Motijheel">Mothjheel</option>


    </select>

<strong>Price Range:</strong>

 <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" name="lprice" placeholder="Lower Price">
    <h2>
      TO
    </h2>

<input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text"  name="hprice" placeholder="Upper Price"><br>


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
  color: white;">Rentgiver Username</th>


    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Price(TK) </th>
    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Phone </th>
    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Email</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Area</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Show Details</th>



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
    $cd["phon"]=$ar[2];
    $cd["email"]=$ar[3];
    $cd["area"]=$ar[4];
    

    $data[]=$cd;

      }

}


if(isset($_POST["search"]))

{
  $i=0;

global $data;
foreach ($data as  $v) 
{
 global $data;
if ($_POST["area"] == $v["area"]  &&   $_POST["lprice"] <= $v["price"]   &&   $_POST["hprice"] >= $v["price"] )
 {
  
 global $i;
 $i++;

?>











  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v["runame"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["price"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["phon"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["email"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["area"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><a style='text-decoration:none;color:green;' href='prodetails.php?d=<?php echo $v["runame"] ; ?> ' >

    

     See Details</a></td>



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
  
     
if( !(  (isset($_POST["search"]))  ||  (isset($_POST["showall"]) )  ) )
{

 global $data;
foreach ($data as  $v)
 {

global $data;

   ?>


 








  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v["runame"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["price"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["phon"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["email"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["area"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><a style='text-decoration:none;color:green;' href='prodetails.php?d=<?php echo $v["runame"] ; ?>' >

    

     See Details</a></td>


  </tr>


<?php 
           
        
}

}

         

    ?>


<?php 
  
     
if(isset($_POST["showall"])) 
{



 global $data;
foreach ($data as  $v)
 {

global $data;

   ?>


 








  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v["runame"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["price"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["phon"];   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["email"];   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v["area"];   ?></td>
      <td style="border: 1px solid #ddd; padding: 8px;"><a style='text-decoration:none;color:green;' href='prodetails.php?d=<?php echo $v["runame"] ; ?> ' >

    

     See Details</a></td>



  </tr>


<?php 
           
        
}

}

         

    ?>
    

















 
</table>
</p>

<a href="Logout.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Logeout</a><br><br><br>


</body>
</html>



<?php




}




?>