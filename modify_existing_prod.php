<!--EVEN IF IT GETS UPDATED THE CORRECT OUTPUT NOT SHOWN PLEASE CHECK-->
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
        $pid=$_POST['pid'];
    if(isset($_POST['pname']))
        $pname=$_POST['pname'];
    if(isset($_POST['price']))
        $price=$_POST['price'];
    
    $sql="UPDATE products SET product_name='$pname',price=$price where product_id=$pid"; 
    $result=pg_query($db,$sql);
   if(pg_num_rows($result)==0)
   {
             //echo "Error:".$sql."<br/>".pg_error($db);
             //-----HAS TO BE FIXED--------
             header('location:modify_prod.php');
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