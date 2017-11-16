<html>
<body>
	<?php

	$time=$_POST["time_data"];
	$text = (explode('Total', $time));
	$time = explode(",", insertComma($time));
	date_default_timezone_set("Asia/Kolkata");
	$timestamp = time();
	$current_time= date("H:i:s",$timestamp);
	$office_working_hour=strtotime("today 8:00");
	$greytHR_total= $text[1];
	$last_in_pos=(sizeof($time))-2;
	$dateTime = DateTime::createFromFormat('d M Y H:i:s a', substr($time [$last_in_pos],4,-3));
	$last_in_time=$dateTime->format('H:i:s');
	// echo "total time " .$greytHR_total."<br>";
	// echo "<br>"."last in time only ".$last_in_time;
	echo "Current server time is	" .  $current_time;
	$total_working_hours = (strtotime($current_time)-strtotime($last_in_time))+strtotime($greytHR_total);
	echo "<br>"."Total Working Hour:  " . date ( 'H:i:s' , $total_working_hours);
	$time_left= $office_working_hour - $total_working_hours;
	echo "<br>". gmdate("H:i:s",$time_left). " left" ;
	$leaving_time =((strtotime($current_time))+$time_left);
	echo ", "."you can leave at ".date ( 'h:i a' , $leaving_time);
	// echo "<br>"."office time ".date ( 'H:i:s' ,$office_working_hour);

	function insertComma($time) {
		$substr_in = 'In';
		$substr_out = 'Out';
		$attachment = ',';
		$newstring = str_replace($substr_in, $substr_in.$attachment, $time);
		$newstring = str_replace($substr_out, $substr_out.$attachment, $newstring);
		return $newstring;
	}

	?>
</body>
</html>