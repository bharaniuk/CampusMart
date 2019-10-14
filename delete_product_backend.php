<?php
   session_start();
$db= pg_connect("host=localhost dbname=campusmart user=postgres password=a1234567890");
    if(!$db)
{
    die("Connection failed: " . pg_connect_error());
}

$errors=array();
if(isset($_POST['submit']))
{

    if(isset($_POST['pname']))
        $pname=$_POST['pname'];
    
    $sql_get_productid="SELECT * FROM products where product_name='$pname'";
    $result_productid=pg_query($db,$sql_get_productid);
    if(pg_num_rows($result_productid)==0)
    {
        header('location:delete_product.php');

    }    
    else{

        $pid=pg_fetch_row($result_productid);
        $sql_check_supp="SELECT * FROM supplier_product where product_id=$pid[0] ";
        $result_sql_check_supp=pg_query($db,$sql_check_supp);

        $supplier=pg_fetch_row($result_sql_check_supp);
        while($supplier)
        {
           
            
            
                $sql_remove_supp="DELETE FROM supplier_product where supplier_id=$supplier[0] and product_id=$pid[0]";
                $result_sql_remove_supp=pg_query($db,$sql_remove_supp);
                $supplier=pg_fetch_row($result_sql_check_supp);
            
        }

        $sql="DELETE FROM products where product_id=$pid[0]"; 
        $result=pg_query($db,$sql);
        }
        
    
   
    
    
   }
   else{
    header('location:delete_product.php');
   }
    
    

?>