<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','ins_registration');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into ins_registration(username, password, email, number) values(?, ?, ?, ?)");
		$stmt->bind_param("sssi", $username, $password, $email, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>