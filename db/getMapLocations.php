<?php

$q = ($_GET['q']);

$db = new SQLite3('mydb.db');
$myStreet="STREET";
$results = $db->query("SELECT * FROM mydb WHERE premise='$myStreet'");


$myArray = array();
while ($row = $results->fetchArray()) {
	array_push($myArray, $row[9]." ". $row[16]);
	
}

echo json_encode($myArray);

?>