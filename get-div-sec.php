<?php
	$connection = mysqli_connect("localhost", "root", "", "srilanka");

	if ( isset($_GET['district_id']) ) {

		$district_id = mysqli_real_escape_string($connection, $_GET['district_id']);

		$query 		= "SELECT * FROM div_sec WHERE district_id = {$district_id}";
		$result_set = mysqli_query($connection, $query);

		$div_sec_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$div_sec_list .= "<option value=\"{$result['div_sec_id']}\">{$result['div_sec_name']}</option>";
		}
		echo $div_sec_list;
	} else {
		echo "<option>Error</option>";
	}

	
?>