<?php
	function makeBet($name, $points, $race, $betType, $driver, $odd) {
		global $conn;
		//pending will be the first status of every bet
		$status = 'pending';
		
		$query = "insert into bets(name,race,type,driver,status,points, odd)
			  values 	('".$name."','".$race."','".$betType."','".$driver."','".$status."','".$points."','".$odd."');";

		$result = pg_exec($conn, $query);
		
	}
	
	function getBetsUser($name) {
		global $conn;
		$query = "select *
				  from bets
				  where name = '".$name."'";
				  

		$result = pg_exec($conn, $query);
		
		return $result;
	}
	
	function getAllBets($type,$race,$status){
		global $conn;
		$query = "select * from bets where 1=1";
		
		//Adding elements dinamically to the query
		if(!empty($type) && sizeof($type) > 0){
			$query .= " AND ";

			for($i=0; $i < sizeof($type);$i++){
					if($i>0){
					$query .= " OR ";
					}
					$query .= "type = '". $type[$i]."'";
			}
		}
		if(!empty($race) && sizeof($race) > 0){
			$query .= " AND ";
			for($i=0; $i < sizeof($race);$i++){
					if($i>0){
					$query .= " OR ";
					}
					$query .= "race= '". $race[$i]."'";
			}
		}
		
		if(!empty($status) && sizeof($status) > 0){
			$query .= " AND ";
			for($i=0; $i < sizeof($status);$i++){
			
					if($i>0){
					$query .= " OR ";
					}
					$query .= "status= '". $status[$i]."'";
			}
		}


		$result = pg_exec($conn, $query);
		return $result;
			

		
	}
	
	function getAllBetTypes(){
		global $conn;
		$query = "select distinct type from bets;";
		$result = pg_exec($conn, $query);
		return $result;
		
	}
	function getAllRaces(){
		global $conn;
		$query = "select distinct race from bets;";
		$result = pg_exec($conn, $query);
		return $result;
	}
	function getAllStatus(){
		global $conn;
		$query = "select distinct status from bets;";
		$result = pg_exec($conn, $query);
		return $result;
	}

	
	function updateStatus ($id, $newStatus) {
		global $conn;
		$query = "update bets
				  set status = '".$newStatus."'
				  where id = '".$id."';";

		$result = pg_exec($conn, $query);
		return $result;
	}
	
	function getBetById ($id){
		global $conn;
		$query = "select * from bets where id='".$id."';";
		$result = pg_exec($conn, $query);
		return $result;
		
	}
	

	
	
?>