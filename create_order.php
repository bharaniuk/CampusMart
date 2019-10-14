<?php
  session_start();
  echo file_get_contents("headerforadmin.html");
?>
<style>

  #submitbutton
{
    padding:10px;
    border-radius: 10px;
    font-family: "Comic Sans MS";
    width:auto;
    font-size: 15px;
    margin-left: 40%;

}
.center{
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
  }
  #main{
    font-family: "Comic Sans MS";
    font-size: 50px;
    border-radius: 5px;
    margin-left: 70%;
    background-color: rgb(216, 220, 238);

    width: 50%;
    border:5px solid rgb(79, 94, 99);
    padding: 15px;
    margin: 25px;}

    .submitbtn
    {
      background-color: rgb(51, 163, 66);
      padding:10px;
      border-radius: 10px;

      width:15%;
      font-size: 15px;
      font-weight: bold;

    }
    .cancelbtn
    {
      background-color: rgb(219, 59, 31);
      padding:10px;
      border-radius: 10px;

      width:15%;
      font-size: 15px;
      font-weight: bold;

    }

    .mycontainer{
            font-family: "Comic Sans MS";
            border: solid black 2px;
            border-radius: 4px;
            background-color: #c0e9f7;
            margin: 5%;
            padding: 3%;
            float: left;
    }

    .myfooter{
            clear: both;
            position: relative;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: #67768B;
            text-align: center;
    }

    .search-container {
            float: left;
    }

    .search-container button {
            float: right;
            padding: 2px 2px;
            margin-top: 2px;
            margin-right: 16px;
            background: #ddd;
            font-size: 15px;
            border: none;
            cursor: pointer;
    }

    .search-container button:hover {
            background: #ccc;
    }

    .search-container button {
    display: block;
    height: 10px;
    text-align: left;
    margin: 0;
    padding: 13px;
  }

  .search_res{
          border: solid black 2px;
          border-radius: 4px;
          background-color: #c0e9f7;
          float: left;
          padding: 5px;
          margin: 2px;
          width: 33%;
  }
  table{
          border:2px solid black;
  }
  tr,th,td{
          padding:20px;
          border:1px solid black;
  }

</style>

<script type="text/javascript">
        function addMoreProd(){
                <?php
                        if($_POST["prod"]){
                                $_SESSION["addMoreProd"] = 1;
                        }
                ?>
        }

        function createOrder(){
                <?php
                        if($_POST["order"]){
                                $_SESSION["createOrder"] = 1;
                        }

                ?>
        }
</script>
  <div class="mycontainer" style="width: 50%; margin: 2%; ">
          <b>Enter details of the items in the order</b><hr>
    <form action="update_order.php" method="post">
        Enter product name <div style="float:right;"><input type="text" name="prod_name1"></div><br><br>
        Enter product quantity <div style="float:right;"><input type="number" name="prod_quantity1"></div><br><br><hr>

        Enter product name <div style="float:right;"><input type="text" name="prod_name2"></div><br><br>
        Enter product quantity <div style="float:right;"><input type="number" name="prod_quantity2"></div><br><br><hr>

        Enter product name <div style="float:right;"><input type="text" name="prod_name3"></div><br><br>
        Enter product quantity <div style="float:right;"><input type="number" name="prod_quantity3"></div><br><br><hr>

      <input type="submit" name="prod" value="Add more products" onclick = "addMoreProd()">
      <input type="submit" name="order" value="Create Order" onclick = "createOrder()">

    </form>
  </div>

  <div style="padding-top: 20px;">
          Get a quick reference to all products<br>
          <div class="search-container">
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
  echo file_get_contents("footer.html");
?>