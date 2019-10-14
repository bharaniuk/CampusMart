<?php
session_start();
$conn = pg_connect("host=localhost dbname=campusmart user=postgres password=tanvi");
if(!$conn){
        die("Connection failed: " . pg_connect_error());
}

else{
        if (isset($_POST['prod'])){
                $_SESSION["createOrder"] = 0;
                $_SESSION["addMoreProd"] = 1;
        }

        if (isset($_POST['order'])){
                $_SESSION["createOrder"] = 1;
                $_SESSION["addMoreProd"] = 0;
        }

        //validation of name and quantity ............................................................
        if (!empty($_POST['prod_name1'])){
                $pn1 = $_POST['prod_name1'];
                $pq1 = $_POST['prod_quantity1'];
                $check_stock1 = "SELECT * FROM products WHERE product_name = '$pn1'";
                $res1 = pg_query($conn, $check_stock1);
                $row1 = pg_fetch_row($res1);
                if (pg_num_rows($res1) == 0){
                        //echo "invalid product";
                        echo "<script>alert('invalid product');</script>";
                        header('location:create_order.php');
                }

                if ($pq1 > $row1[5]){
                        echo "Not enough stock<br>";
                        header('location:create_order.php');
                }
        }

        if (!empty($_POST['prod_name2'])){
                $pn2 = $_POST['prod_name2'];
                $pq2 = $_POST['prod_quantity2'];
                $check_stock2 = "SELECT * FROM products WHERE product_name = '$pn2'";
                $res2 = pg_query($conn, $check_stock2);
                $row2 = pg_fetch_row($res2);
                if (pg_num_rows($res2) == 0){
                        //echo "invalid product";
                        echo "<script>alert('invalid product');</script>";
                        header('location:create_order.php');
                }

                if ($pq2 > $row2[5]){
                        echo "Not enough stock<br>";
                        header('location:create_order.php');
                }
        }

        if (!empty($_POST['prod_name3'])){
                $pn3 = $_POST['prod_name3'];
                $pq3 = $_POST['prod_quantity3'];
                $check_stock3 = "SELECT * FROM products WHERE product_name = '$pn3'";
                $res3 = pg_query($conn, $check_stock3);
                $row3 = pg_fetch_row($res3);
                if (pg_num_rows($res3) == 0){
                        //echo "invalid product";
                        echo "<script>alert('invalid product');</script>";
                        header('location:create_order.php');
                }

                if ($pq3 > $row3[5]){
                        echo "Not enough stock<br>";
                        header('location:create_order.php');
                }
        }
        //echo "session variables .....addprod = " . $_SESSION["addMoreProd"] . " .... createOrder = ". $_SESSION["createOrder"] . "<br>";

        //running the queries....................................................................................
        //tables to be updated = prod, all_orders, order_items, items
        if (!empty($_POST['prod_name1'])){
                //update products
                $new_stock = $row1[5] - $pq1;
                $update = "UPDATE products SET stock = '$new_stock' WHERE product_name = '$pn1'";
                $done = pg_query($conn, $update);

                //update items
                $p_id = $row1[0];
                $item_data = "SELECT * from items";
                $res_items_all = pg_query($conn, $item_data);
                $myrows = pg_fetch_row($res_items_all);
                $found = 0;
                while($myrows){
                        if ($myrows[0] == $p_id){
                                $new_price = $myrows[2] +  $pq1*$row1[4];
                                $new_quantity = $myrows[1] + $pq1;
                                $found = 1;
                                $upd = "UPDATE items SET quantity = '$new_quantity', price = '$new_price'";
                                pg_query($conn, $upd);
                                break;
                        }
                        $myrows = pg_fetch_row($res_items_all);
                }
                if ($found == 0){
                        $price = $pq1*$row1[4];
                        $insert_into_items = "INSERT INTO items VALUES ('$p_id','$pq1','$price')";
                        pg_query($conn, $insert_into_items);
                }
        }

        if (!empty($_POST['prod_name2'])){
                //update products
                $new_stock = $row2[5] - $pq2;
                $update = "UPDATE products SET stock = '$new_stock' WHERE product_name = '$pn2'";
                $done = pg_query($conn, $update);

                //update items
                $p_id = $row2[0];
                $item_data = "SELECT * from items";
                $res_items_all = pg_query($conn, $item_data);
                $myrows = pg_fetch_row($res_items_all);
                $found = 0;
                while($myrows){
                        if ($myrows[0] == $p_id){
                                $new_price = $myrows[2] +  $pq2*$row2[4];
                                $new_quantity = $myrows[1] + $pq2;
                                $found = 1;
                                $upd = "UPDATE items SET quantity = '$new_quantity', price = '$new_price'";
                                pg_query($conn, $upd);
                                break;
                        }
                        $myrows = pg_fetch_row($res_items_all);
                }
                if ($found == 0){
                        $price = $pq2*$row2[4];
                        $insert_into_items = "INSERT INTO items VALUES ('$p_id','$pq2','$price')";
                        pg_query($conn, $insert_into_items);
                }
        }

        if (!empty($_POST['prod_name3'])){
                //update products
                $new_stock = $row3[5] - $pq3;
                $update = "UPDATE products SET stock = '$new_stock' WHERE product_name = '$pn3'";
                $done = pg_query($conn, $update);

                //update items
                $p_id = $row3[0];
                $item_data = "SELECT * from items";
                $res_items_all = pg_query($conn, $item_data);
                $myrows = pg_fetch_row($res_items_all);
                $found = 0;
                while($myrows){
                        if ($myrows[0] == $p_id){
                                $new_price = $myrows[2] +  $pq3*$row3[4];
                                $new_quantity = $myrows[1] + $pq3;
                                $found = 1;
                                $upd = "UPDATE items SET quantity = '$new_quantity', price = '$new_price'";
                                pg_query($conn, $upd);
                                break;
                        }
                        $myrows = pg_fetch_row($res_items_all);
                }
                if ($found == 0){
                        $price = $pq3*$row3[4];
                        $insert_into_items = "INSERT INTO items VALUES ('$p_id','$pq3','$price')";
                        pg_query($conn, $insert_into_items);
                }
        }


        if ($_SESSION["addMoreProd"] == 1){
                $_SESSION["addMoreProd"] = 0;
                header('location:create_order.php');
        }

        if ($_SESSION["createOrder"] == 1){
                //echo "now in update order ..... doing that";
                $_SESSION["createOrder"] = 0;

                //getting date
                $res_date = date("Y-m-d");
                //echo 'getting date ....<br>';
                //echo $res_date. '<br>';

                echo file_get_contents("headerforadmin.html");
                echo "<h2 align = 'center'>ORDER SUMMARY</h2>";
                echo "<div style= 'width:auto;'><table style='margin-left:32%;'><th>Sl No</th><th>Product Id</th><th>Quantity</th><th>Price</th>";

                //getting the set of products
                $items = "SELECT * from items";
                $res_items = pg_query($conn, $items);
                $row_item = pg_fetch_row($res_items);
                $array = array();

                $tot_amt = 0;
                $count = 0;

                while($row_item){
                        $tot_amt = $tot_amt + $row_item[2];

                        $new_array = array('$row_item[0]', '$row_item[1]', '$row_item[2]');
                        $sub_set = '{'. $row_item[0]. ', '. $row_item[1] . ', ' . $row_item[2] . '}';
                        //echo "pushing this = " . $sub_set. '<br>';
                        array_push($array, $sub_set);
                        //echo "pushed to set ... ";
                        //echo 'product_id = ' . $row_item[0] . 'quantity = ' . $row_item[1] . 'price = ' . $row_item[2] . '<br>';

                        $count = $count + 1;

                        echo "<tr><td>". $count ."</td><td>". $row_item[0] ."</td><td>". $row_item[1] . "</td><td>" . $row_item[2]."</td></tr>";
                        $row_item = pg_fetch_row($res_items);
                }

                $final_set = '{';
                $len = sizeof($array);
                $c = 0;

                if ($len == 1){
                        $final_set = $array[0];
                }
                else{
                        foreach ($array as $sub_set){
                                $c = $c + 1;
                                if ($c != $len){
                                        $final_set = $final_set . $sub_set . ',';
                                }
                                else{
                                        $final_set = $final_set . $sub_set;
                                }
                        }

                        $final_set = $final_set . '}';
                }

                //echo 'final set to be inserted = ' . "$final_set". '<br>';
                //echo  'total amt to be added = ' . $tot_amt . '<br>';

                echo "<tr style='border:2px solid black;'><td></td><td></td><td></td><td>". $tot_amt ."</td></tr>";
                $insert_into_all_orders = "INSERT INTO all_orders(order_date,order_products,total_amount,login_id) values ('$res_date', '$final_set', '$tot_amt', 'admin')";
                pg_query($conn, $insert_into_all_orders);
                //echo 'finished inserting into all orders';

                //udpate order_items
                $last = "SELECT MAX(order_number) FROM all_orders";
                $res_last = pg_query($conn, $last);
                $row = pg_fetch_row($res_last);
                $o_no = $row[0];
                //echo "order number to be added is =>" . $o_no . ' <= order no ....<br>';

                $items_data = "SELECT * from items";
                $res_items_data = pg_query($conn, $items_data);
                $row = pg_fetch_row($res_items_data);
                while($row){
                        $p_id = $row[0];
                        // echo 'product id got is  = '. $p_id. '<br>';
                        $insert_into_order_items = "INSERT INTO order_items VALUES ('$o_no', '$p_id')";
                        pg_query($conn, $insert_into_order_items);
                        $row = pg_fetch_row($res_items_data);
                }

                //echo 'deleting from items<br>';
                $delete = "DELETE FROM items";
                pg_query($conn, $delete);

                echo "</table></div>";
        }
}

?>