<?php

	$mysqli = new mysqli("localhost", "root", "", "ajax_search");
 
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

?>