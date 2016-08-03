<?php
	require_once __DIR__.'/db_connect.php';
	
	$db= new DB_CONNECT();
	
	//$conn=$db.connect();
	
	$result=mysql_query("Select user_id from users where phone_num = +918952979627")or die(mysql_error());
	

	
	if(mysql_num_rows($result)<=0)
	{
	$sql=mysql_query("INSERT INTO users (phone_num, first_name, last_name, gender)
	VALUES ('+9193452345','Jake', 'Joshi', 0)")or die(mysql_error());
	$response["SUCCESS"]=1;
	}
	else{
	$response["message"]="Number already exits";
	}
	echo json_encode($response);

	// if ($conn->query($sql) === TRUE) {
		// echo "New record created successfully";
	// } else {
		// echo "Error: " . $sql . "<br>" . $conn->error;
	// }


?>