
<!DOCTYPE html>
<html>
<head>
	<title>Campus Mart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
		#t1{
			font-family: cursive;
			background-color: #404354;
			margin-top: 0px;
			height: 90px;
			width: 100%;
			font-size: 50px;
			text-align: center;
			color:white;
			margin-bottom: 0px;


		}
		#t1 a{
			text-decoration: none;
			color: white;
			font-size: 20px;
			padding-top: 30px;
			padding-bottom: 10px;
			margin-right: 20px;
			position: relative;
			display: inline;
			float: right;
			
		}
		.active:hover {
    		border-bottom: 2px solid white;
		}
		.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close ,.close1,.close2,.close3,.close4,.close5,.close6{
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close,.close1,.close2,.close3,.close4,.close5,.close6:hover,
.close,.close1,.close2,.close3,.close4,.close5,.close6:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

        
	</style>
</head>
<body>
	<img src="logo.png" style="height: 70px;padding-top: 10px;padding-left:8px;padding-right: 50px;display: inline;position: absolute; ">
	<h1 id="t1">
		Campus Mart

	<a class="active" href="main.html" style="font-family:initial;" >ADMIN LOGIN</a>
	</h1>
	<div id="drinks" style="border: solid black 2px;border-radius: 4px;width: 22%;margin: 5%;float: left;font-size: 20px;padding-top:20px;padding-bottom: 100px;padding-left:0px;text-align:center;">
      	Drinks
      	<img src="colddrinks.jpg" style="width: 250px;position:relative;height: 180px;">
      	  	
    </div>
    <div style="border: solid black 2px;border-radius: 4px;width: 22%;margin: 5%;float: left;font-size: 20px;padding-top:20px;padding-bottom: 100px;padding-left:0px;text-align:center;" id="eat">
      	Eatables
      	<img src="kurkure.jpg" style="width: 250px;position:relative;height: 180px;padding-top: 15px;">
      	  	
    </div>
    <div style="border: solid black 2px;border-radius: 4px;width: 22%;margin: 5%;float: left;font-size: 20px;padding-top:20px;padding-bottom: 100px;padding-left:0px;text-align:center;" id="art">
      	Art and Crafts
      	<img src="artncraft.png" style="width: 250px;position:relative;height: 180px;padding-top: 15px;">
      	  	
    </div>
    <div style="border: solid black 2px;border-radius: 4px;width: 22%;margin: 5%;float: left;font-size: 20px;padding-top:20px;padding-bottom: 100px;padding-left:0px;text-align:center;" id="station">
      	Stationery
      	<img src="station.jpg" style="width: 250px;position:relative;height: 180px;padding-top: 15px;">
      	  	
    </div>
    <div style="border: solid black 2px;border-radius: 4px;width: 22%;margin: 5%;float: left;font-size: 20px;padding-top:20px;padding-bottom: 100px;padding-left:0px;text-align:center;" id="calci">
      	Calculator
      	<img src="calci.png" style="width: 250px;position:relative;height: 180px;padding-top: 15px;">
      	  	
    </div>
    <div style="border: solid black 2px;border-radius: 4px;width: 22%;margin: 5%;float: left;font-size: 20px;padding-top:20px;padding-bottom: 100px;padding-left:0px;text-align:center;" id="textb">
      	Textbooks
      	<img src="text.jpg" style="width: 250px;position:relative;height: 180px;padding-top: 15px;">
      	  	
    </div>
    <div style="border: solid black 2px;border-radius: 4px;width: 22%;margin: 5%;float: left;font-size: 20px;padding-top:20px;padding-bottom: 100px;padding-left:0px;text-align:center;margin-left: 480px;" id="noteb">
      	Notebooks
      	<img src="note.jpg" style="width: 250px;position:relative;height: 180px;padding-top: 15px;">
      	  	
    </div>


    <div id="myModal" class="modal">

        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Beat the summer with cold drinks!</p>
            <?php
              $db= pg_connect("host=localhost dbname=campusmart user=postgres password=tanvi");
              $sql="SELECT product_name FROM products WHERE category_id=1";
              $res=pg_query($db,$sql);
              $row = pg_fetch_row($res);
              echo"<ol>";
              while($row)
              {
                  
                  echo "<li>",$row[0],"</li>";
                 $row = pg_fetch_row($res);
              }
              
            ?>
<!--             <ol>
                <li>Tropicana</li>
                <li>Coco-Cola</li>
                <li>Fanta</li>
            </ol> -->
        </div>

    </div>

    <div id="myModal1" class="modal">

        <div class="modal-content">
            <span class="close1">&times;</span>
            <p>Hungry? Grab your Favourites!</p>

             <?php
              $db= pg_connect("host=localhost dbname=campusmart user=postgres password=tanvi");
              $sql="SELECT product_name FROM products WHERE category_id=2";
              $res=pg_query($db,$sql);
              $row = pg_fetch_row($res);
              echo"<ol>";
              while($row)
              {
                  
                  echo "<li>",$row[0],"</li>";
                 $row = pg_fetch_row($res);
              }
              
            ?>
            <!-- <ol>
                <li>Kurkure</li>
                <li>Lays</li>
                <li>Doublemint</li>
            </ol> -->
        </div>

    </div>

    <div id="myModal2" class="modal">

        <div class="modal-content">
            <span class="close2">&times;</span>
            <p>Art and Crafts!</p>
            <?php
              $db= pg_connect("host=localhost dbname=campusmart user=postgres password=tanvi");
              $sql="SELECT product_name FROM products WHERE category_id=3";
              $res=pg_query($db,$sql);
              $row = pg_fetch_row($res);
              echo"<ol>";
              while($row)
              {
                  
                  echo "<li>",$row[0],"</li>";
                 $row = pg_fetch_row($res);
              }
              
            ?>
           <!--  <ol>
                <li>Scissors</li>
                <li>Fevicol</li>
                <li>Chart Paper</li>
            </ol> -->
        </div>

    </div>

    <div id="myModal3" class="modal">

        <div class="modal-content">
            <span class="close3">&times;</span>
            <p>Stationery Items</p>
            <?php
              $db= pg_connect("host=localhost dbname=campusmart user=postgres password=tanvi");
              $sql="SELECT product_name FROM products WHERE category_id=5";
              $res=pg_query($db,$sql);
              $row = pg_fetch_row($res);
              echo"<ol>";
              while($row)
              {
                  
                  echo "<li>",$row[0],"</li>";
                 $row = pg_fetch_row($res);
              }
              
            ?>
            <!-- <ol>
                <li>Pen</li>
                <li>Pencil</li>
                <li>Scale</li>
            </ol> -->
        </div>
    </div>

    <div id="myModal4" class="modal">

        <div class="modal-content">
            <span class="close4">&times;</span>
            <p>Calculators for your convenience!</p>
            <?php
              $db= pg_connect("host=localhost dbname=campusmart user=postgres password=tanvi");
              $sql="SELECT product_name FROM products WHERE category_id=4";
              $res=pg_query($db,$sql);
              $row = pg_fetch_row($res);
              echo"<ol>";
              while($row)
              {
                  
                  echo "<li>",$row[0],"</li>";
                 $row = pg_fetch_row($res);
              }
              
            ?>
          <!--   <ol>
                <li>Casio FX-991 ES</li>
                <li>Casio FX-990 MS</li>
                <li>Casio Simple calculator</li>
            </ol> -->
        </div>

    </div>

    <div id="myModal5" class="modal">

        <div class="modal-content">
            <span class="close5">&times;</span>
            <p>Textbooks!</p>
            <?php
              $db= pg_connect("host=localhost dbname=campusmart user=postgres password=tanvi");
              $sql="SELECT product_name FROM products WHERE category_id=6";
              $res=pg_query($db,$sql);
              $row = pg_fetch_row($res);
              echo"<ol>";
              while($row)
              {
                  
                  echo "<li>",$row[0],"</li>";
                 $row = pg_fetch_row($res);
              }
              
            ?>
            <!-- <ol>
                <li>DBMS 7th edition</li>
                <li>Theory of computation</li>
                <li>Linear Algebra and its Applications</li>
            </ol> -->
        </div>

    </div>

    <div id="myModal6" class="modal">

        <div class="modal-content">
            <span class="close6">&times;</span>
            <p>Notebooks!</p>
            <?php
              $db= pg_connect("host=localhost dbname=campusmart user=postgres password=tanvi");
              $sql="SELECT product_name FROM products WHERE category_id=7";
              $res=pg_query($db,$sql);
              $row = pg_fetch_row($res);
              echo"<ol>";
              while($row)
              {
                  
                  echo "<li>",$row[0],"</li>";
                 $row = pg_fetch_row($res);
              }
              
            ?>
           <!--  <ol>
                <li>Classmate ruled books</li>
                <li>Papergrid books</li>
                <li>2 in one rough notebooks</li>
            </ol> -->
        </div>

    </div>


    <script>
        var modal = document.getElementById('myModal');
        var btn = document.getElementById("drinks");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
          modal.style.display = "block";
        }
        span.onclick = function() {
          modal.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        //Eatables
        var modal1 = document.getElementById('myModal1');
        var btn1 = document.getElementById("eat");
        var span1 = document.getElementsByClassName("close1")[0];
        btn1.onclick = function() {
          modal1.style.display = "block";
        }
        span1.onclick = function() {
          modal1.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal1) {
            modal1.style.display = "none";
          }
        }

        var modal2 = document.getElementById('myModal2');
        var btn2 = document.getElementById("art");
        var span2 = document.getElementsByClassName("close2")[0];
        btn2.onclick = function() {
          modal2.style.display = "block";
        }
        span2.onclick = function() {
          modal2.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal2) {
            modal2.style.display = "none";
          }
        }

        var modal3 = document.getElementById('myModal3');
        var btn3 = document.getElementById("station");
        var span3 = document.getElementsByClassName("close3")[0];
        btn3.onclick = function() {
          modal3.style.display = "block";
        }
        span3.onclick = function() {
          modal3.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal3) {
            modal3.style.display = "none";
          }
        }

        var modal4 = document.getElementById('myModal4');
        var btn4 = document.getElementById("calci");
        var span4 = document.getElementsByClassName("close4")[0];
        btn4.onclick = function() {
          modal4.style.display = "block";
        }
        span4.onclick = function() {
          modal4.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal4) {
            modal4.style.display = "none";
          }
        }

        var modal5 = document.getElementById('myModal5');
        var btn5 = document.getElementById("textb");
        var span5 = document.getElementsByClassName("close5")[0];
        btn5.onclick = function() {
          modal5.style.display = "block";
        }
        span5.onclick = function() {
          modal5.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal5) {
            modal5.style.display = "none";
          }
        }

        var modal6 = document.getElementById('myModal6');
        var btn6 = document.getElementById("noteb");
        var span6 = document.getElementsByClassName("close6")[0];
        btn6.onclick = function() {
          modal6.style.display = "block";
        }
        span6.onclick = function() {
          modal6.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal6) {
            modal6.style.display = "none";
          }
        }
    </script>
    <footer class="page-footer font-small blue pt-4" style="background-color: #67768B;position: relative;margin-top:1400px;bottom: 0;">
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
        
    
</body>
</html>