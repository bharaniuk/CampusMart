<?php
//echo "flag0";
$db= pg_connect("host=localhost dbname=campusmart user=postgres password=tanvi");
    if(!$db){
    die("Connection failed: " . pg_connect_error());
}


$errors=array();
if(isset($_POST['submit1'])) {
	
	if (isset($_POST['login_id'])) {
    $name = $_POST['login_id'];
   
}
if (isset($_POST['passcode'])) {
    $pass = $_POST['passcode'];
    
    
}


	//$user=mysqli_real_escape_string($conn,$_POST['Login_ID']);	
	//$password=mysqli_real_escape_string($conn,$_POST['Password']);
	if(empty($name)){
		array_push($errors, "Username is required");
	}
	if(empty($pass)){
		array_push($errors, "Password is Required");
	}
	$c=count($errors);
	//echo($c);
	if($c==0) {
		$sql="SELECT * FROM administrator WHERE passcode = '$pass' AND login_id = '$name'";
		$q=pg_query($db,$sql);
		//echo(pg_num_rows($q));
		if((pg_num_rows($q))==1){
			//echo("hi");
			$_SESSION["login_id"]=$name;
			$_SESSION["success"]=true;
			header('Location:afteradminlogin.php');
	}
	else{
	 	header('location: mainerror.html');
	}
}
}



?>