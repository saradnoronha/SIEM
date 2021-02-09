<?php

	function rand_float($min, $max){
		
		$mul = 1000000;
		if($min > $max) return false;
		return mt_rand($min*$mul,$max*$mul)/$mul;
		
	}

?>