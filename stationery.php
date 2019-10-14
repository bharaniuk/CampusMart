<!DOCTYPE html>
<html>
<head>
	<title>Campus Mart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel = "stylesheet" href = "style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<style>
                html {
                        height: 100%;
                        box-sizing: border-box;
                }

                *,
                *:before,
                *:after {
                        box-sizing: inherit;
                }

                *body {
                        position: relative
                        height: 100%;
                        min-height: 100%;
                }

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


	</style>
</head>
<body>
	<a href="mainpage1.html" >
	<img src="logo.png" style="height: 70px;padding-top: 10px;padding-left:8px;padding-right: 50px;display: inline;position: absolute; "></a>
	<h1 id="t1" >
		STATIONERY

	</h1>
<style>
	li{
		font-size: 20px;

		
	}
	
	#price{
		font-size: 18px;
		border: 2px solid black;
		width: 120px;
		padding: 3px;
		margin-left: 350px;
		margin-top: 40px;
		position: absolute;

	}
	#price1{
		font-size: 18px;
		border: 2px solid black;
		width: 120px;
		padding: 3px;
		margin-left: 350px;
		margin-top: 90px;
		position: absolute;

	}
	div{
		font-size: 18px;
		width: 50%;
		display: inline-block;

	}
	hr{
		border: 1px solid black;
		width: 100%;
	}
	img{
		height: 150px;
	}
</style>
<?php

	$db= pg_connect("host=localhost dbname=campusmart user=postgres password=tanvi");
              $sql="SELECT * FROM products WHERE category_id=5";
              $res=pg_query($db,$sql);
              $row = pg_fetch_row($res);
              echo"<ol>";
              while($row)
              {
                  
                echo "<div>";
              	echo "<li>",$row[2],"</li>";
              	echo "<div id=","price",">","Price : ",$row[4],"</div>";
              	echo "<div id=","price1",">","Stock : ",$row[5],"</div>";
              	echo "<img src=",$row[6],">";
              	echo "<br>";
                echo "<div>",$row[3],"</div>";
              	
              	echo"<br><hr><br><br>";
              	echo "</div>";
                 $row = pg_fetch_row($res);
              }
?>