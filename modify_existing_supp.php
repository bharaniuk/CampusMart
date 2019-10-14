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
   if(isset($_POST['sname']))
      $sname=$_POST['sname'];
   if(isset($_POST['contact']))
      $contact=$_POST['contact'];
   if(isset($_POST['saddress']))
      $saddress=$_POST['saddress'];


   $sql="UPDATE supplier SET contact_number=$contact,s_address='$saddress' where supplier_name='$sname'";
   $result=pg_query($db,$sql);
   if(pg_num_rows($result)==0)
   {
             //echo "Error:".$sql."<br/>".pg_error($db);
             //-----HAS TO BE FIXED--------
             header('location:modify_supp.php');
             //echo "<script>alert('Invalid entry!');</script>";
            
   }
   else
   {
            //----WHAT IS TO BE DONE HAS TO BE DECIDED--------
            echo"successfull";
            array_push($errors,"successfully updated");
   }
}
?>