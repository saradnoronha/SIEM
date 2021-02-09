<?php

	function getBetTypes() {
		global $conn;
		$query = "select bettype
				  from type;";
		$result = pg_exec($conn, $query);
		return $result;
	}
	
?>