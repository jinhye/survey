<?php 

	@extract($_GET);
	@extract($_POST);
	@extract($_SERVER);

	include('./connect_db.php');
		
	//db connect
	$conn = new mysqli($host_name, $db_user, $db_pw, $db_name);
	if($conn->connect_error){
		die('Connection failed: '. $conn->connect_error);
	}

	$sql = "update survey set $team = $team + 1";
	$result = $conn->query($sql);

?>

<meta http-equiv="Refresh" content='1; URL=survey_result.php'>
Your vote is succeeded