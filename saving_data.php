<?php session_start();
if (isset($_GET['table'])) {
  	$table =  $_GET['table'];
	  	
  	if ($table ==="general_info") {
  		$_SESSION['general_info']["name"] = $_GET["name"];
  		$_SESSION['general_info']["email"] = $_GET["email"];
  		$_SESSION['general_info']["password"] = $_GET["password"];
  		print_r($_SESSION['general_info']);
	}

	if ($table ==="contact_info") {
		$name = $_SESSION['general_info']["name"];
		$email = $_SESSION['general_info']["email"];
		$password = $_SESSION['general_info']["password"];
		$address1 = $_GET['address1'];
		$address2 = $_GET['address2'];
		$country = $_GET['country'];
		$phone = $_GET['phone'];
		$db = new mysqli('localhost', 'root', '', 'skill_test') or die('db not connected');
		$sql = "insert into general_info(name,email,password)values('$name','$email','$password')";
	    $db->query($sql) or die("general_info table data not saved");
     	unset($_SESSION['general_info']);
     	$sql1 = "insert into contact_info(address_one,address_two,country,phone)values('$address1','$address2','$country','$phone')";
	    $db->query($sql1) or die("contact_info table data not saved");
	    echo "success";
	}
}

 ?>
