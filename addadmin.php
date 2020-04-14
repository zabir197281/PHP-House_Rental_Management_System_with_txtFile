<?php
session_start();

if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes")
{
  
?>



<!DOCTYPE html>
<html>

<body>

<h2 style="text-shadow: 1px 1px blue">Add admin Please:</h3>

<div style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">

<?php
 if(isset($_POST["submit"]))
         {
  if($_POST["fname"]=="" ||  $_POST["lname"]=="" || $_POST["uname"]=="" || $_POST["pass"]=="" || $_POST["cpass"]=="" || 
    $_POST["phon"]=="" ||  $_POST["email"]=="")

  {
    echo  "<p style='color:red'>Please fill up all the fields.</p>";
  }
}

?>



  <form action="addadmin.php" method="post">
    <label for="fname">First Namr:</label>
    <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="fname" name="fname" placeholder="First Name...">
    

    <label for="lname">Last Name:</label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="lname" name="lname" placeholder="Last Name....">

     

    <label for="uname">User Name:</label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="uname" name="uname" placeholder="User Name....">

     




     <label for="pass">Password:</label>(min: 4)
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="password" id="pass" name="pass" placeholder="Password....">
     <?php
         if(isset($_POST["submit"]))
         {
     if($_POST["fname"] !="" &&  $_POST["lname"] !="" && $_POST["uname"] !="" && $_POST["pass"] !="" && $_POST["cpass"]!="" && 
     $_POST["phon"] !="" &&  $_POST["email"]!="")
    {

        if(strlen($_POST["pass"])<4)
  {
    echo "<p style='color:red'>Valid Pasword Length  is  minimum 4 </p>";
  }
}

 }
   

    ?>
    


    <label for="cpass">Conferm Password:</label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="password" id="cpass" name="cpass" placeholder="Conferm Password....">


     <?php
      if(isset($_POST["submit"]))
         {
          
       if($_POST["cpass"]!=$_POST["pass"])
  {
    echo "<p style='color:red'>Passwords Doesn't Match.</p>";
  }
}
    ?>



   <label for="phon">Phone:</label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text"  id="phon" name="phon" placeholder="Phone..." >

     <?php
      if(isset($_POST["submit"]))
         {

      if($_POST["fname"] !="" &&  $_POST["lname"] !="" && $_POST["uname"] !="" && $_POST["pass"] !="" && $_POST["cpass"]!="" && 
     $_POST["phon"] !="" &&  $_POST["email"]!="")
    {


          if(strlen($_POST["phon"])!=11 || strpos($_POST["phon"],"0")!=0)
     {  
     echo "<p style='color:red'>Incorrect Phone Number</p>";
     }

     else

   {
    if (is_numeric($_POST["phon"]))
    {
    
    }
    else
    {
      echo "<p style='color:red'>Please Provide Valid Phone Number</p>";
    }

    }
    
  }
        
}
    ?>


    <label for="email">Email:</label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="email" name="email" placeholder="Email...">


     <?php 
      if(isset($_POST["submit"]))
         {
           if($_POST["fname"] !="" &&  $_POST["lname"] !="" && $_POST["uname"] !="" && $_POST["pass"] !="" && $_POST["cpass"]!="" && 
     $_POST["phon"] !="" &&  $_POST["email"]!="")
    {
     
    if(strpos($_POST["email"],"@")==0 || strpos($_POST["email"],"@")>=strpos($_POST["email"],"."))
  {
    echo"<p style='color:red'>Invalid Email.</p>";
  }

}
}
     
    ?>

    <label >Gender:</label>

     <p>
      <label>
        <input name="group1" type="radio"  value="Male" checked />
        <span>Male</span>
      </label>
    </p>
    <p>
      <label>
        <input name="group1" type="radio"  value="Female" />
        <span>Femail</span>
      </label>
    </p>
    <p>
      <label>
        <input name="group1" type="radio" value="Others"  />
        <span>Others</span>
      </label>
    </p><br><br><br>



    
  
    <input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;float: left;" type="submit"  name="submit" value="Insert"><br><br><br>

   

  </form>

   <a href="admin.php" title=""  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float:left;">Back</a><br><br><br>

  

</div>






</body>
</html>
 
 <?php

 if(isset($_POST["submit"]))
         {

   if(strpos($_POST["email"],"@")!=0 && strpos($_POST["email"],"@") < strpos($_POST["email"],".") && $_POST["cpass"]==$_POST["pass"] && 
    $_POST["fname"]!="" && $_POST["lname"]!="" && $_POST["phon"]!="" && $_POST["email"]!="" && $_POST["pass"]!="" && $_POST["uname"]!="" &&
    $_POST["cpass"]!="" && strlen($_POST["pass"])>3 && strlen($_POST["phon"]) == 11 && strpos($_POST["phon"],"0") == 0 && 
    is_numeric($_POST["phon"]) )
  {
     
     
    
       $file=fopen("adminInfo.txt","a") or die("fle open error");
        $c=0;
        $c=$c+fwrite($file,"\r\n");
        $c=$c+fwrite($file,$_POST["fname"]); 

        $c=$c+fwrite($file,"-");
        $c=$c+fwrite($file,$_POST["lname"]);

         $c=$c+fwrite($file,"-");
        $c=$c+fwrite($file,$_POST["uname"]);


        $c=$c+fwrite($file,"-");
        $c=$c+fwrite($file,$_POST["phon"]);

        $c=$c+fwrite($file,"-");
        $c=$c+fwrite($file,$_POST["email"]);

        $c=$c+fwrite($file,"-");
        $c=$c+fwrite($file,md5($_POST["pass"]));

        $c=$c+fwrite($file,"-");
        $c=$c+fwrite($file,$_POST["group1"]);

        

        





         $file=fopen("LoginInfo.txt","a") or die("fle open error");
         $c=0;
         $c=$c+fwrite($file,"\r\n");
         $c=$c+fwrite($file,$_POST["uname"]);

         $c=$c+fwrite($file,"-");
         $c=$c+fwrite($file,md5($_POST["pass"]));

         $c=$c+fwrite($file,"-");
         $c=$c+fwrite($file,"Admin");




echo "<h3 style='color:green'>You hame successfully added an admin.</h3>";


}

}


 ?>

 <?php
}

 ?>