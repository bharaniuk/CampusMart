<?php
  echo file_get_contents("headerforadmin.html");
  session_start();
?>
<style>
		table{
					float:left;
          border:2px solid black;
          margin-top:5px;
  }
  tr,th,td{
          padding:20px;
          border:1px solid black;
  }
		
        
    </style>
    
    <form action="delete_product_backend.php" method="POST" >
                    <div id="main" style="width: 550px;float:left;">
                        <h3>Enter detail for deletion</h3>
                        <br>
                       
                        <label for="prodname">Product name : </label><br> <input type="text" name="pname">
                        <br><br>

                        

                        <button type="reset" name="reset"class="cancelbtn">Cancel</button>
                        <input type="submit" name="submit" value="Delete" class="submitbtn" >
                    </div>
    
<?php

  $conn = pg_connect("host=localhost dbname=campusmart user=postgres password=a1234567890");
  if(!$conn){
          die("Connection failed: " . pg_connect_error());
  }
  else{
          

                  $query = "SELECT * FROM products WHERE lower(product_name) LIKE '%". "%';";
                  //$query = "SELECT * from products;";
                  //$query = "SELECT * FROM products WHERE product_name LIKE '%". $_POST['search'] ."%';";
                  $res = pg_query($conn, $query);

                  

                  
                          echo"<table>";
                          $row = pg_fetch_row($res);
                          echo"<th>Product ID</th><th>Product Name</th><th>Price</th><th>Stock</th>";
                          while ($row)
                          {       
                                  echo"<tr>";
                                  
                                  echo "<td>",$row[0],"</td>","<td>",$row[2],"</td>","<td>",$row[4],"</td>","<td>",$row[5],"</td>";
                               
                                  echo"</tr>";
                                  $row = pg_fetch_row($res);
                          }
                          echo"</table>";
                  
          }
  
  echo file_get_contents("footer.html");
?>