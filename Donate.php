<?php
	$mobile=$_POST["mobile"];
	$name=$_POST["Name"];
	$b_group=$_POST["blood1"];	

	// Create connection
	$conn = new mysqli("localhost", "root", "", "blood_info");
	// Check connection
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO Blood_Group (Name,Phone,Blood_Group) 
	VALUES ('$name','$mobile','$b_group')";

	if ($conn->query($sql) === TRUE) {
  			echo "<center><h1>New record created successfully.We will contact you when blood is required</h1></center>";
	}
	 else {
  		echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();
?>