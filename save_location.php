<?php

	$response=array();
	
		if(isset($_POST['user_id']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['status']) && isset($_POST['last_login'])){
			
			$user_id=$_POST['user_id'];
			//$phone=$_POST['phone_num'];
			$latitude=$_POST['latitude'];
			$longitude=$_POST['longitude'];
			$status=$_POST['status'];
			$last_login=$_POST['last_login'];
			
			require_once __DIR__.'/db_connect.php';
	
			$db= new DB_CONNECT();
			
			$result=mysql_query("select user_id_fk from location
								where user_id_fk='$user_id'")or die(mysql_error());
			
		
			
			if(mysql_num_rows($result)>0){
				// $sql=mysql_query("update  location set( latitude, longitude, status, last_login)
					//			values ('$latitude', '$longitude', '$status', '$last_login') 
						//		where user_id_fk='1'")or die(mysql_error());
						$response["result"]=mysql_num_rows($result);
				
				  $sql=mysql_query("update location 
						set latitude='$latitude', longitude='$longitude', status='$status' ,last_login='$last_login'
						where user_id_fk='$result'")or die(mysql_error());
				
				$response["SUCCESS"]=1;	
				$response["message"]="Location updated successfully";
			}
			else{
				$sql=mysql_query("INSERT INTO location (user_id_fk, latitude, longitude, status, last_login)
				VALUES ('$user_id', '$latitude', '$longitude', '$status', '$last_login')")or die(mysql_error());
				$response["SUCCESS"]=1;	
				$response["message"]="Location added successfully";
			}

		}		
		else{
			$response["SUCCESS"]=0;	
			$response["message"]="Error occured during parsing";
		}
		echo json_encode($response);
?>