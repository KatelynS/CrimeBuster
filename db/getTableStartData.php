<?php

//get dataset that inistiate table visualization on load
$db = new SQLite3('mydb.db');
$results = $db->query("SELECT * FROM mydb");


$dataArray = array();
while ($row = $results->fetchArray()) {
	$innerArray = array();
 array_push($innerArray, $row[3]);
 array_push($innerArray, $row[6]);
 array_push($innerArray, $row[7]);
 array_push($innerArray, $row[21]);
 array_push($innerArray, $row[19]);
 array_push($innerArray, $row[10]);
 array_push($innerArray, $row[17]);
 array_push($innerArray, $row[8]);
 array_push($innerArray, $row[4]);
 array_push($innerArray, $row[5]);
  
  array_push($dataArray, $innerArray);
}

$jsonArray = array("data" =>$dataArray);

echo json_encode($jsonArray);
?>