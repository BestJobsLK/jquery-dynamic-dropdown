<?php
	$connection = mysqli_connect("localhost", "root", "", "srilanka");

	if ( isset($_GET['province_id']) ) {

		$province_id = mysqli_real_escape_string($connection, $_GET['province_id']);

		$query 		= "SELECT * FROM district WHERE province_id = {$province_id}";
		$result_set = mysqli_query($connection, $query);

		$district_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$district_list .= "<option value=\"{$result['district_id']}\">{$result['district_name']}</option>";
		}
		echo $district_list;
	} else {
		echo "<option>Error</option>";
	}

	
?>