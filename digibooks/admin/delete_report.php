<?php require_once("../config.php");

if(isset($_GET['id'])){
	$query = query("DELETE FROM reports WHERE report_id=".escape_string($_GET['id'])." ");
	confirm($query);
	set_message("Report Deleted");
	redirect("reports.php");
}else {
	redirect("reports.php");
}?>
