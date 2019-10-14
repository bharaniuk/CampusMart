<?
    session_start();
$db= pg_connect("host=localhost dbname=campusmart user=postgres password=tanvi");
if(!$db)
{
    die("Connection failed: " . pg_connect_error());
}
$errors=array();
if(isset($_POST['submit']))
{
    
    if(isset($_POST['s_id']))
        $s_id=$_POST['s_id'];
    if(isset($_POST['sname']))
        $sname=$_POST['sname'];
    if(isset($_POST['contact']))
        $contact=$_POST['contact'];
    if(isset($_POST['saddress']))
        $saddress=$_POST['saddress'];

    $sql="INSERT INTO supplier VALUES('$sname','$s_id',$contact,'$saddress')";
    $result=pg_query($db,$sql);
    if(pg_num_rows($result)==0)
    {
        //--------HAS TO BE FIXED----------
        header('location:add_supplier.php');
        //echo "<script>alert('Invalid Supplier');</script>";
        //die("Error:".$sql."<br/>".pg_last_error($db));
    }
    else
    {
        echo "<script>alert('Inserted!');</script>";
            //echo"successfully Inserted";
    }

}
