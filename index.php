<?php
	$connection = mysqli_connect("localhost", "root", "", "srilanka");

	$query 		= "SELECT * FROM province";
	$result_set = mysqli_query($connection, $query);

	$province_list = "";
	while ( $result = mysqli_fetch_assoc($result_set) ) {
		$province_list .= "<option value=\"{$result['province_id']}\">{$result['province_name']}</option>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dynamic Drop Down List</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Dynamic Drop Down List</h1>

	<form action="">
		
		<div>
			<label for="province">Select Province:</label>
			<select name="province" id="province">
				<?php echo $province_list; ?>
			</select>
		</div>

		<div>
			<label for="district">Select District:</label>
			<select name="district" id="district">
				
			</select>
		</div>

		<div>
			<label for="div_sec">Select Divisional Secretariat:</label>
			<select name="div_sec" id="div_sec">
				
			</select>
		</div>

	</form>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>	
	<script>
		$(document).ready(function(){
			$("#province").on("change", function(){
				var provinceId = $("#province").val();
				var getURL     = "get-districts.php?province_id=" + provinceId;
				$.get(getURL, function(data, status){
					$("#district").html(data);
				});
			});

			$("#district").on("change", function(){
				var districtId = $("#district").val();
				var getURL     = "get-div-sec.php?district_id=" + districtId;
				$.get(getURL, function(data, status){
					$("#div_sec").html(data);
				});
			});
		});		
	</script>
</body>
</html>