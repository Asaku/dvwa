<?php

if( isset( $_REQUEST[ 'Submit' ] ) ) {

	$query = "UPDATE `users` SET ";
	$sep = " ";
	foreach ($_REQUEST as $key => $value) {
		if ($key != "Submit") {
			$query .= $sep . $key . " = '" . $value ."'";
			$sep = ", ";
		}
	}

	// Update database
	$query .= " WHERE user = '" . dvwaCurrentUser() . "' LIMIT 1;";

	$result = mysqli_query($GLOBALS["___mysqli_ston"],  $query ) or die( '<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );
	updateUserSession();
	// Feedback for user
	$html .= "<pre>User Changed.</pre>";


	mysqli_close($GLOBALS["___mysqli_ston"]);
}

?>
