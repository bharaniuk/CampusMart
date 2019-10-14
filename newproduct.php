<?php
  echo file_get_contents("headerforadmin.html");
?>
<style>
        table{
          float:left;
          border:2px solid black;
  }
  tr,th,td{
          padding:20px;
          border:1px solid black;
  }
    
        
    </style>
    <form action="addnewproduct.php" method="POST">
        <div id="main" style="width: 550px;float:left;" >
        
    <h3>Enter Product details</h3>
    <br>
    <label for="prodID" id="label1">Product ID :    </label>    <label for="catID">Category ID :</label>
    <br>   
    <input type="text" name="pid">
                <input type="text" name="cid">
          <br>
    <br>
    <label for="prodname" id="label2">Product Name :</label>    <label for="supplier_id">Supplier ID : </label>
    <br> 
    <input type="text" name="pname">
                <input type="text" name="s_id">
    <br>
    <br>
    <label for="price" id="label3">Price : </label>   <label for="stock">Stock : </label> 
    <br> 
            
    <input type="number" name="price">
                <input type="number" name="stock" >
                <br>
    <br>
    <label for="prod_desc" id="l4" style="padding-right:60px;">Product Description : </label> 
    <label for="image">Image link : </label>
                <br>
                <textarea name="pdesc" rows=3  cols=20  style="font-size: 12px;margin-right:30px;"></textarea>
                <textarea name="img_link"  rows=3 cols=20 style="font-size: 12px;padding-left:0px;"></textarea>
                <br>
    <br>
            <button type="reset" name="reset"class="cancelbtn">Cancel</button>
            <input type="submit" name="submit" class="submitbtn" value="Add product">
       
    </form>
  </div>
  <div style="padding-top:20px;display:inline;float:left;">
          Get a quick reference to all products<br>
          <div class="search-container" style="float:left;">
                  <form action="" method="post">
                          <input type="text" placeholder="Search.." name="search">
                          <!--<button type="submit"><i class="fa fa-search" style="padding-top:2px;"></i></button>-->
                          <input type="submit" name = "search_btn" value="Go"><br><br>
                          <br>
                  </form>
          </div>
  </div>
<?php

  $conn = pg_connect("host=localhost dbname=campusmart user=postgres password=tanvi");
  if(!$conn){
          die("Connection failed: " . pg_connect_error());
  }
  else{
          if (isset($_REQUEST['search'])){
                  extract($_POST);
                  $string = $_POST['search'];

                  $query = "SELECT * FROM products WHERE lower(product_name) LIKE '%". $string. "%';";
                  //$query = "SELECT * from products;";
                  //$query = "SELECT * FROM products WHERE product_name LIKE '%". $_POST['search'] ."%';";
                  $res = pg_query($conn, $query);

                  if (pg_num_rows($res) == 0){
                          echo "<br>Oops! No products match your search<Br>Try again";
                  }

                  else{
                          echo"<table>";
                          $row = pg_fetch_row($res);
                          echo"<th>Product ID</th><th>Category ID</th><th>Product Name</th><th>Price</th><th>Stock</th>";
                          while ($row)
                          {       
                                  echo"<tr>";
                                  
                                  echo "<td>",$row[0],"</td>","<td>",$row[1],"</td>","<td>",$row[2],"</td>","<td>",$row[4],"</td>","<td>",$row[5],"</td>";
                               
                                  echo"</tr>";
                                  $row = pg_fetch_row($res);
                          }
                          echo"</table>";
                  }
          }
  }
  echo file_get_contents("footer.html");
?>