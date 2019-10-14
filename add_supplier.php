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
    <form action="addnewsupplier.php"method="POST">
        <div id="main" style="width: 550px;float:left;" >
        
						<h3>Enter Supplier details</h3>
						<br>
						<label for="s_id" id="label1">Supplier ID :    </label>   
                        <br>
                        <input type="number" name="s_id">   
                        <br>    
                        <br>
                        <label for="sname">Supplier Name :</label>
                        <br>
                        <input type="text" name="sname">
						<br>
						<br>
                        <label for="scontact">Contact Number :</label>
                        <br>
                        <input type="number" name="contact">
                        <br>
                        <br>
                        
                        <label for="saddress">Supplier address : </label> 
                        <br>
                        <textarea name="saddress" id="pdesc" rows=3  cols=60	 style="font-size: 12px;"></textarea>
                        <br>
                        <br>
    
						
            <button type="reset" name="reset"class="cancelbtn">Cancel</button>
            <input type="submit" name="submit" class="submitbtn" value="Add supplier">
       
    </form>
	</div>
	<div style="padding-top: 20px;display:inline;">
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
        if (isset($_REQUEST['search']))
        {
	        extract($_POST);
		$string = $_POST['search'];

		$query = "SELECT * FROM supplier WHERE lower(supplier_name) LIKE '%". $string. "%';";
		//$query = "SELECT * from products;";
		//$query = "SELECT * FROM products WHERE product_name LIKE '%". $_POST['search'] ."%';";
		$res = pg_query($conn, $query);

                if (pg_num_rows($res) == 0)
                {
		echo "<br>Oops! No supplier match your search<Br>Try again";
		}

                else
                {
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
