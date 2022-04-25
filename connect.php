<?php
    $email = $_POST['email'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(email,password,address,city,zip) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $email,$password,$address,$city,$zip);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>