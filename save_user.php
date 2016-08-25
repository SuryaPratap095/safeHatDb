<?php
	
	
	//$conn=$db.connect();
	
	$response=array();
	
	if(isset($_POST['phone_num']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['gender'])){
	
	
		$phone=$_POST['phone_num'];
		$FirstName=$_POST['first_name'];
		$LastName=$_POST['last_name'];
		$gender=$_POST['gender'];

		require_once __DIR__.'/db_connect.php';
	
		$db= new DB_CONNECT();

		$result=mysql_query("Select user_id from users where phone_num ='$phone'")or die(mysql_error());
	
	
		if(mysql_num_rows($result)>0)
		{
			$sql=mysql_query("INSERT INTO users (phone_num, first_name, last_name, gender)
			VALUES ('$phone','$FirstName', '$LastName', '$gender')")or die(mysql_error());
			$response["SUCCESS"]=1;
			$response["message"]="Number added successfully";
		
		}
	else{
			$response["SUCCESS"]=0;
			$response["message"]="Number already exits";
		}
	}
	else
	{	
		$response["SUCCESS"]=0;	
		$response["message"]="Error occured during parsing";
	}
	
	echo json_encode($response);


?>