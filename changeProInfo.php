


<?php

session_start();

 if(isset($_POST["submit"]))
         {

 $a=0;  
   if( $_POST["price"]!="" && $_POST["Size"]!="" && $_POST["Floor"]!="" && $_POST["nofrooms"]!="" && $_POST["Address"]!="" )
  {
     global $a;
     $a++;


     


      $cred=array();
      

     $file=fopen("RentGiverInfo.txt","r") or die("file error");
     while($c=fgets($file))
   {
   $ar=explode("-",$c);
   if (isset($ar[0]) && isset($ar[1]) && isset($ar[2])  && isset($ar[3]) && isset($ar[4]) && isset($ar[5]) && isset($ar[6]) && isset($ar[7]) && isset($ar[8])) 
  
  {  


   if ($_SESSION["uname"]== $ar[2] )
   {
  
  global $cred;
     

  $cred["uname"]=$ar[2];
  $cred["phon"]=$ar[3];
  $cred["email"]=$ar[4];
  
  break;


}

     
   }

}

$myfile = fopen("PropertyInfo.txt", "r") or die("Unable to open file!");
    $data=array();
    $temp=array();
    
    while($line=fgets($myfile)) {

       $ar=explode("-",$line);
    



if (isset($ar[0]) && isset($ar[1]) && isset($ar[2])  && isset($ar[3]) && isset($ar[4]) && isset($ar[5]) && isset($ar[6]) && isset($ar[7]) && isset($ar[8])) 
  
  {  
             global $temp;
             global $data;


      
      $temp["uname"]=$ar[0];
      $temp["price"]=$ar[1];
      $temp["phon"]=$ar[2];
      $temp["email"]=$ar[3];
      $temp["area"]=$ar[4];
      $temp["address"]=$ar[5];
      $temp["numofroom"]=$ar[6];
      $temp["size"]=$ar[7];
      $temp["floor"]=$ar[8];
      
    
      $data[]=$temp;

    }


    }
    

      fclose($myfile);


      $i=0;
    foreach($data as $row)
    {
      if($row["uname"]==$_SESSION["uname"] )
      {
                global $cred;

        $row["uname"]=$cred["uname"];
      $row["price"]=$_POST["price"];
      $row["phon"]=$cred["phon"];
      $row["email"]=$cred["email"];
      $row["area"]=$_POST["area"];
      $row["address"]=$_POST["Address"];
      $row["numofroom"]=$_POST["nofrooms"];
      $row["size"]=$_POST["Size"];
      $row["floor"]=$_POST["Floor"];
      }

      global $i;

      $data[$i]=$row;
        
        $i++;
    }

    $myfile = fopen("PropertyInfo.txt", "w") or die("Unable to open file!");
    $str="";
    fwrite($myfile,$str); 

    
    foreach($data as $row)
    {   

          $c=0;
        $c=$c+fwrite($myfile,"\r\n");
        $c=$c+fwrite($myfile,$row["uname"]); 

        $c=$c+fwrite($myfile,"-");
        $c=$c+fwrite($myfile,$row["price"]);

         $c=$c+fwrite($myfile,"-");
        $c=$c+fwrite($myfile, $row["phon"]);


        $c=$c+fwrite($myfile,"-");
        $c=$c+fwrite($myfile,$row["email"]);

        $c=$c+fwrite($myfile,"-");
        $c=$c+fwrite($myfile,$row["area"]);

        $c=$c+fwrite($myfile,"-");
        $c=$c+fwrite($myfile,$row["address"]);

        $c=$c+fwrite($myfile,"-");
        $c=$c+fwrite($myfile,$row["numofroom"]);

        $c=$c+fwrite($myfile,"-");
        $c=$c+fwrite($myfile,$row["size"]);

        $c=$c+fwrite($myfile,"-");
        $c=$c+fwrite($myfile, $row["floor"]);

         




    } 
    
      

    
  
    fclose($myfile);


  }


  

        




echo "<h3 style='color:green'> Successfully changed the property Info.</h3>";


}




 ?>






















<!DOCTYPE html>
<html>
<head>
	<title>Details page</title>
	<h2 style="color:blue;">Property Details:</h2>
</head>
<body >

<div style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
  



<?php
if ( ! (isset($_POST["submit"]))) {
  


$file=fopen("PropertyInfo.txt", "r");
$data=array();
$i=0;

while ($c=fgets($file)) {
 
 global $i;

     $ar=explode("-",$c);
    
   if (isset($ar[0]) && isset($ar[1]) && isset($ar[2]) && isset($ar[3]) && isset($ar[4]) && isset($ar[5]) && isset($ar[6]) && isset($ar[7]) && isset($ar[8]) ) 
       
{    
   

 global $i;
  
      
if ( $_SESSION["uname"]==$ar[0]  )
	   
{

global  $i;
     $i++;

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



   <?php   
                  
               break;  


      
  }


}
   

     

}


if($i==0)

{
	echo "<h3 style='color:red;'>No property found to change</h3>";
}



}


?>

<?php
if (  isset($_POST["submit"])) {
  


$file=fopen("PropertyInfo.txt", "r");
$data=array();
$i=0;

while ($c=fgets($file)) {
 
 global $i;

     $ar=explode("-",$c);
    
   if (isset($ar[0]) && isset($ar[1]) && isset($ar[2]) && isset($ar[3]) && isset($ar[4]) && isset($ar[5]) && isset($ar[6]) && isset($ar[7]) && isset($ar[8]) ) 
       
{    
   

 global $i;
  
      
if ( $_SESSION["uname"]==$ar[0]  )
     
{

global  $i;
     $i++;

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



   <?php   
                  
               break;  


      
  }


}
   

     

}


if($i==0)

{
  echo "<h3 style='color:red;'>No property found to change</h3>";
}



}


?>
                     
  


















</div>


<div style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">

<?php
 if(isset($_POST["submit"]))
         {
  if($_POST["price"]=="" ||  $_POST["Size"]==""  || $_POST["Floor"]=="" || $_POST["nofrooms"]=="" || 
    $_POST["Address"]=="" )

  {
    echo  "<p style='color:red'>Please fill up all the fields.</p>";
  }
}

?>



  <form action="changeProInfo.php" method="post">

    <label for="price">Price(TK) :</label>
    <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="price" name="price" placeholder="price...">
    

    <label for="Size">Size(Sq):</label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="Size" name="Size" placeholder="Size....">

      <label for="Floor">Floor:</label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="Floor" name="Floor" placeholder="Floor....">


   
     




     <label for="nofrooms">Number of rooms:</label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="nofrooms" name="nofrooms" placeholder="Number of rooms....">
    
    


    <label for="Address">Address:</label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="Address" name="Address" placeholder="Address...">


    



   


  
  

   


     <p>

<label >Area:</label><br><br>
  <select  name="area">
  <option value="Gulshan">Gulshan</option>
  <option value="Motijheel">Motijheel</option>
  <option value="Nayapolton">Nayapolton</option>
  
 
</select>
  
    </p><br><br><br>



    <a href="rentgiver.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Back</a><br><br><br>



  
    <input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;float: left;" type="submit"  name="submit" value="Changr Info"><br><br><br>

   

  </form>

  

</div>













</body>
</html>


 
 