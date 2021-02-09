<?php

	function getAllDrivers() {
		global $conn;
		$query = "select * 
				  from drivers;";
		$result = pg_exec($conn, $query);
		return $result;
	}
	
	function getDriversNames() {
		global $conn;
		$query = "select driver 
				  from drivers;";
		$result = pg_exec($conn, $query);
		return $result;
	}
?>