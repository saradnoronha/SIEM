<?php
	
	function registUser($name,$pass,$birthdate,$email){
		global $conn;
		$points = 50; /* points given to the new users */
		$type = 'user';
		$query = "insert into users(name,pass,email,birthdate,points,type)
				  values ('".$name."','".$pass."','".$email."','".$birthdate."','".$points."','".$type."');";
		$result = pg_exec($conn, $query);
		
		/* isto está a fazer alguma coisa? */
		if (pg_exec($conn, $result)) {
			echo "New record created successfully";
		} else {
			echo "Error: ";
		}
		/*return $result;*/	
	}
	
	function validateUser($name, $pass) {
		global $conn;
		$query = "select * 
				  from users 
				  where name = '".$name."' AND
						pass = '".$pass."';";
		$result = pg_exec($conn, $query);
	
		//Get the number of the lines that match the result
		$num_result = pg_numrows($result);
		
		//If >0 then the combination of the name and pass exist
		if ($num_result > 0) {
			$row = pg_fetch_row($result, 0);
			return $row[1];
		}
		else 
			return NULL;
	}
	
	function findUserType($user) {
		global $conn;
		$query = "select type 
				  from users
				  where name = '".$user."';";
		$result = pg_exec($conn, $query);
		return $result;
	}
	
	function getUserPoints($user) {
		global $conn;
		$query = "select points 
					from users 
					where name = '".$user."';";
		$result = pg_exec($conn, $query);
		return $result;
	}
	
	function updatePoints($user, $newPoints) {
		global $conn;
		$query = "update users 
				  set	points = '".$newPoints."'
				  where name='".$user."';";
		$result = pg_exec($conn, $query);
		return $result;
	}
	
	function getAccountInfo($user) {
		global $conn;
		$query = "select *
				  from users
				  where name = '".$user."';";
		$result = pg_exec($conn, $query);
		return $result;
	}
	
	function editAccountInfo($id, $name, $birthdate, $email, $pass) {
		global $conn;
		$query = "update users
				  set name = '".$name."',
					  birthdate = '".$birthdate."',
					  email = '".$email."',
					  pass = '".$pass."'
				  where id = '".$id."';";	  
		$result = pg_exec($conn, $query);
		return $result;
	}
	
	function getAllUsers($user) {
		global $conn;
		$query = "select name, email, birthdate, points
				  from users 
				  where type = 'user'";
		if($user)	{
			$query .= " AND name like '$user'";
		}
		$result = pg_exec($conn, $query);
		return $result;
	}
	
	
	function compareUsersNames($user) {
		global $conn;
		$query = "select * 
				  from users
				  where name = '".$user."';";
		$result = pg_exec($conn, $query);
		return $result;
	}
	
?>