


<!DOCTYPE html>
<html>

<body>

<h2 style="text-shadow: 1px 1px blue">Insert property</h3>

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



  <form action="addpro.php" method="post">

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


      <label for="files"><b>Uplode House Picture:</b></label><br>
   <input style="width: 35%;padding: 12px 20px;color:blue; font-weight:bold;background-color: white;     margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="file" id="files" name="ufile">




    



   


  
  

   


     <p>

<label >Area:</label><br><br>
  <select  name="area">
  <option value="Gulshan">Gulshan</option>
  <option value="Motijheel">Motijheel</option>
  <option value="Nayapolton">Nayapolton</option>
  
 
</select>
  
    </p><br><br><br>



    
  
    <input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;float: left;" type="submit"  name="submit" value="Submit"><br><br><br>

   

  </form>

   <a href="rentgiver.php" title=""  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float:left;">Back</a><br><br><br>

  

</div>






</body>
</html>
 
 <?php


if(isset($_POST["submit"]))
         {


$filename = $_FILES["ufile"]["name"];
$tempfile = $_FILES["ufile"]["tmp_name"];

$foider = "House_pic/".$filename ;

move_uploaded_file($tempfile, $foider);









if( $_POST["price"]!="" && $_POST["Size"]!="" && $_POST["Floor"]!="" && $_POST["nofrooms"]!="" && $_POST["Address"]!="" && $filename != "" )
  {
      session_start();
   


$connect = mysqli_connect( "localhost", "root", "","final_project");

$sql=" select * from rentgiverinfo ";

$result = mysqli_query($connect,$sql) or die  ( mysqli_error($connect)  );

$cre = array();

while ($row = mysqli_fetch_assoc($result)  ) 
{




if ($_SESSION["uname"] ==  trim($row["UserName"] ) )
   {
  
  global $cre;
     

  $cre["uname"]=$row["UserName"];
  $cre["phon"]=$row[" Phone"];
  $cre["email"]=$row["Email"];
  
  break;


}

     
   

}








$connect = mysqli_connect( "localhost", "root", "","final_project");

$sql=" insert into propertyinfo values ('".  $cre["uname"]      ."','".   $_POST["price"]       ."','".  $cre["phon"]        ."','".    $cre["email"]          ."',

'".   $_POST["area"]       ."','".  $_POST["Address"]     ."','".   $_POST["nofrooms"]       ."','".   $_POST["Size"]       ."','".   $_POST["Floor"]       ."' , '".  $foider  ."'

) ";

$result = mysqli_query($connect,$sql) or die  ( mysqli_error($connect)  );






echo "<h3 style='color:green'>Registration Successfull.</h3>";


}

}





?>