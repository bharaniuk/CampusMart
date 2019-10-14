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
if(isset($_POST['pid']))
   $pid= $_POST['pid'];
if(isset($_POST['cid']))
   $cid=$_POST['cid'];
if(isset($_POST['s_id']))
   $s_id=$_POST['s_id'];
if(isset($_POST['pname']))
   $pname=$_POST['pname'];
if(isset($_POST['pdesc']))
   $des=$_POST['pdesc'];
if(isset($_POST['price']))
   $price=$_POST['price'];
if(isset($_POST['stock']))
   $stock=$_POST['stock'];
if(isset($_POST['img_link']))
   $imglink=$_POST['img_link'];

//Checking if the supplier exists
$check_s_id="SELECT * from supplier where supplier_id=$s_id";
$result=pg_query($db,$check_s_id);
if(pg_num_rows($result)==0)
{
   //------HAS TO BE FIXED
   header('location:newproduct.php');
   echo "<script>alert('Invalid Supplier');</script>";
   
}
else
{
   $sql="INSERT INTO products VALUES($pid,$cid,'$pname','$des',$price,$stock,'$imglink','admin')";
   $sql2="INSERT INTO supplier_product VALUES($s_id,$pid)";
         //header('location:newproduct.html');
   $result2=pg_query($db,$sql);
         
   if(pg_num_rows($result2)==0)
   {
            //die("Error:".$sql."<br/>".pg_last_error($db));
            //echo"Error";
            //alert('Please re-enter');
            //header('location: newproduct.php');
           // echo "<script>alert('There's been an error please try again!');</script>";
           echo "<script>alert('Invalid product');</script>";
           header('location:newproduct.php');


           //----HAS TO BE FIXED


            //echo "<script> window.location.assign('newproduct.php');</script>";


            
   }
   else
   {
            //-----WHERE TO GO NEXT--------
            $result2=pg_query($db,$sql2);
            array_push($errors,"successfully inserted");
            echo "<script>alert('Inserted!');</script>";
            //echo"successfully Inserted";
   }
}

}



?>