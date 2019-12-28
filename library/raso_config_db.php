<?php
session_start();
include("raso_table.php");
// shows connectivity to database
function conn1()
{
	$link = mysqli_connect(LOCALHOST, USERNAME, PASSWORD,DATABASE);
	return $link;
}
//$dbObj=connect();
//define("DB_OBJ",$obj);

?>