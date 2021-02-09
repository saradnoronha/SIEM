<?PHP

	function getOddsByBetType($type) {
		global $conn;
		$query = "select race, driver, odd
				  from odds
				  where type = '".$type."';";
		$result = pg_exec($conn, $query);
		return $result;
	}
	
	function discoverOdd($race, $betType, $driver) {
		global $conn;
		$query = "select * 
				  from odds
				  where race= '".$race."' AND 
						type = '".$betType."' AND
						driver = '".$driver."';";
		$result = pg_exec($conn, $query);
		return $result;	
	}
	
	function createOdd($location, $betType, $driver, $odd) {
		global $conn;
		$query = "insert into odds (race, type, driver, odd)
				  values ('".$location."', '".$betType."', '".$driver."', '".$odd."');";
		$result = pg_exec($conn, $query);
		return $result;
	}
	
	function deleteOdds($race) {
		global $conn;
		$query = "delete from odds
				  where race = '".$race."';";
		$result = pg_exec($conn, $query);
		return $result;
		
	}
	
	
	

?>