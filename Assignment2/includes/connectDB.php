<?PHP
	$conn = pg_connect("host=DB dbname=siem2025 user=siem2025 password=zMtasKbw");
	
	if (!$conn) {
		print "The connection failed";
		exit;
	}
	
	$query = "set schema 'f1';";
	pg_exec($conn, $query);
?>

