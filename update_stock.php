<?php
   session_start();
$db= pg_connect("host=localhost dbname=campusmart user=postgres password=tanvi");
    if(!$db)
{
    die("Connection failed: " . pg_connect_error());
}

$errors=array();
if(isset($_POST['submit']))
{
   if(isset($_POST['pname']))
      $pname=$_POST['pname'];
   if(isset($_POST['stock']))
      $stock=$_POST['stock'];


   $sql="UPDATE PRODUCTS SET stock=stock+$stock where product_name='$pname'";
   $result=pg_query($db,$sql);
   echo $result;
   if(pg_num_rows($result)==0)
   {
             //echo "Error:".$sql."<br/>".pg_error($db);
             //-----HAS TO BE FIXED--------
             header('location:update_existingproduct.php');
             echo "<script>alert('Invalid product!');</script>";
            
   }
   else
   {
            //----WHAT IS TO BE DONE HAS TO BE DECIDED--------
            echo"successfull";
            array_push($errors,"successfully inserted");
   }
}
?>