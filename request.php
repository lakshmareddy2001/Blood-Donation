<?php
	$bgroup=$_POST["blood1"];
	echo("<body style=background:sandybrown;>");
	echo("<center><h1 style=color:green>Your response is here </h1></center>");
	echo("<center>");
	echo("<br><br><br><br><br><h3 style=color:red;>Please contact the donars below</h3><table><tr><th>Name</th><th>Phone</th></tr>");

	//connecting Database
	$conn=new mysqli("localhost","root","","blood_info");
	if($conn->connect_error)
	{
		die("Failed to connect".$conn->connect_error);
	}
	else
	{
		$stmt=$conn->prepare("SELECT * from blood_group where Blood_Group=?");
		$stmt->bind_param("s",$bgroup);
		$stmt->execute();
		$stmt_result=$stmt->get_result();
		if($stmt_result->num_rows>0)
		{
			while($data=$stmt_result->fetch_assoc())
			{
				echo("<tr><td>".$data['Name']."</td><td>".$data['Phone']."</td></tr>");
			}
		}
		else
		{
			echo("Invalid");
		}

		echo("</center></table>");
		echo("</body>");
	}
?>