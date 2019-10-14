<?php
  echo file_get_contents("headerforadmin.html");
  session_start();
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
    
    <form action="update_stock.php" method="POST" >
                    <div id="main" style="width: 550px;float:left;">
                        <h3>Enter new stock</h3>
                        <br>
                       
                        <label for="prodname">Product name : </label><br> <input type="text" name="pname">
                        <br><br>

                        <label for="stock">New stock : </label><br> <input type="number" name="stock">
                        <br><br>

                        <button type="reset" name="reset"class="cancelbtn">Cancel</button>
                        <input type="submit" name="submit" value="Update stock" class="submitbtn" >
                    </div>
    </form>
    <div style="padding-top:20px;display:inline ;float:left;">
          Get a quick reference to all products<br>
          <div class="search-container" style="float:left;">
                  <form action="" method="post">
                          <input type="text" placeholder="Search.." name="search">
                          <!--<button type="submit"><i class="fa fa-search" style="padding-top:2px;"></i></button>-->
                          <input type="submit" name = "search_btn" value="Go">
                          <br>
                  </form>
          </div>
  </div>
  <br>

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
          }
  }
  
?>
 <footer class="page-footer font-small blue pt-4" style="background-color: #67768B;position: relative;margin-top:470px;bottom: 0;">
    <div class="container-fluid text-center text-md-left" style="color: black;">
    <div class="row">
        <div class="col-md-6 mt-md-0 mt-3">

          <h5 class="text-uppercase">About Us</h5>
          <p>Campus Book Mart is a local bookstore serving the students, faculty and staff of PES University - Bangalore with pride. Our primary goal is to ensure students are able to obtain the course materials they need at reasonable prices. We also provide many other items to support your academic career and college spirit. Please browse our website or stop by our store anytime!</p>

        </div>
        
        <div class="col-md-3 mb-md-0 mb-3">
      <h5 class="text-uppercase">ADDRESS</h5>
              <p>PES University<br>
                100 Feet Ring Road,BSK III stage<br>
                Bangalore - 560085
              </p>
          </div>
          
          <div class="col-md-3 mb-md-0 mb-3">
            
            <h5 class="text-uppercase">CONTACT</h5>
              <p>
                Ph-no :  +91 80 26721983<br>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;+91 80 26772108
              </p>
          </div>
         
      </div>
    </div>
    
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a style="text-decoration: none;color: black;"> CampusMart.com</a>
    </div>
  </footer>
        
