<?php
  echo file_get_contents("headerforadmin.html");
  session_start();
?>
<style>
table
{
          float:left;
          border:2px solid black;
}
tr,th,td
{
          padding:20px;
          border:1px solid black;
  }
		
        
</style>
    
    <form action="modify_existing_supp.php" method="POST" >
                    <div id="main" style="width: 550px;float:left;">
                        <h3>Enter details for updation</h3>
                        <br>

                        <label for="sname">Supplier name : </label><br> <input type="text" name="sname">
                        <br><br>

                        <label for="contact">Contact number : </label><br> <input type="number" name="contact">
                        <br><br>
												<label for="saddress">Supplier address : </label> 
                        <br>
                        <textarea name="saddress" id="pdesc" rows=3  cols=60	 style="font-size: 12px;"></textarea>
                        <br>
                        <br>

                        <button type="reset" name="reset"class="cancelbtn">Cancel</button>
                        <input type="submit" name="submit" value="Update" class="submitbtn" >
                    </div>
    </form>
    <div style="padding-top:20px;display:inline;float:left;">
          Get a quick reference to all suppliers<br>
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

								$query = "SELECT * FROM supplier WHERE lower(supplier_name) LIKE '%". $string. "%';";
								//$query = "SELECT * from products;";
								//$query = "SELECT * FROM products WHERE product_name LIKE '%". $_POST['search'] ."%';";
								$res = pg_query($conn, $query);

								if (pg_num_rows($res) == 0){
												echo "<br>Oops! No products match your search<Br>Try again";
								}

								else{
												echo"<table>";
												$row = pg_fetch_row($res);
												echo"<th>Supplier Name</th><th>Contact number</th><th>Address</th>";
												while ($row)
												{       
																echo"<tr>";
																
																echo "<td>",$row[0],"</td>","<td>",$row[2],"</td>","<td>",$row[3],"</td>";
														 
																echo"</tr>";
																$row = pg_fetch_row($res);
												}
												echo"</table>";
								}
				}
}
echo file_get_contents("footer.html");
?>
