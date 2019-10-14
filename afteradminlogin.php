<?php
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
            border: solid black 2px;
            border-radius: 4px;
            background-color: #9dafcc;
            width: 20%;
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
</style>
  <h3 align = "center">At Campus Mart you can</h3>

  <form action="options.php" method="post">
    <div class="mycontainer" style="padding-bottom: 30px;margin-left:120px; ">
      Got a new customer ?<br>Just create their order here!<br><br>
      <!--<a href="create_order.php"><button type="button" class="btn  btn-primary" name = "create_order" value="">Create Order</button></a><br>-->
      <a href="create_order.php"><input type="button" name="create_order" value="Create Order" style="white-space: normal;margin-left: 30px;margin-top: 20px;color: black;"></a><br>
    </div>

    <div class="mycontainer" style="padding-bottom: 30px; ">
      Want to add a new product to your store ?<br>Enter the details here!<br><br>
      <a href="newproduct.php"><input type="button" name="add_prod" value="Add a new Product" style="white-space: normal;margin-left: 20px;color: black;"></a>
    </div>

    <div class="mycontainer" style="padding-bottom: 10px; ">
      Change the details of an existing product ?<br>You can do that here<br><br>
      <a href="modify_prod.php"><input type="button" name="modify_prod" value="Modify an existing product" style="white-space: normal;color: black;"></a>
    </div>

    <div class="mycontainer" style="padding-bottom: 20px;margin-left:120px; ">
      Want to update the stock of a product ?<br><br><br>
      <a href="update_existingproduct.php"><input type="button" name="update_quantity" value="Update stock of existing product" style="white-space: normal;color: black;"></a><br>
    </div>

    <div class="mycontainer" style="padding-bottom: 20px; ">
      Got a new supplier ? <br>Add them here<br><br><br><br>
      <a href="add_supplier.php"><input type="button" name="add_supplier" value="Add a new Supplier" style="white-space: normal;margin-left: 20px;color: black;"></a>
    </div>

    <div class="mycontainer" style="padding-bottom: 20px; ">
      Changing details of an existing supplier ? <br>Do it here<br><br>
      <a href="modify_supp.php"><input type="button" name="modify_supp" value="Modify details of existing supplier" style="white-space: normal;color: black;"></a>
    </div>

  </form>

<?php
        echo file_get_contents("footer.html");
?>