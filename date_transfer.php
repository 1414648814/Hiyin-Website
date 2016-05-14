<?php
	function transfer($str){
		$result = explode(".",$str);
		$year = $result[0];
		$month = $result[1];
		$date = $result[2];
		$hour = $result[3];
		$minite = $result[4];
		$second = $result[5];
		return $year."-".$month."-".$date."\n\r".$hour.":".$minite.":".$second;
	}
?>