<?PHP

	function getAllRaces() {
		global $conn;
		$query = "select *
				  from races;";
		$result = pg_exec($conn, $query);
		return $result;
	}
	
	function getRaceLocation() {
		global $conn;
		$query = "select location
				  from races;";
		$result = pg_exec($conn, $query);
		return $result;
	}
	
	function addRace($location, $circuit, $date) {
		global $conn;
		$query = "insert into races (location, circuit, date)
				  values ('".$location."', '".$circuit."', '".$date."');";
		$result = pg_exec($conn, $query);
		return $result;
	}
	
	function getRaceById($id) {
		global $conn;
		$query = "select * 
				  from races 
				  where id=".$id.";";
		$result = pg_exec($conn, $query);
		return $result;	
	}
	
	function removeRace($id) {
		global $conn;
		$query = "delete
				  from races 
				  where id=".$id.";";
		$result = pg_exec($conn, $query);
		return $result;
	}
	
	
?>