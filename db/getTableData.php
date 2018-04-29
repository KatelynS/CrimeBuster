<?php


$db = new SQLite3('mydb.db');
$results = $db->query("SELECT * FROM mydb;");

$myArray = array();
while ($row = $results->fetchArray()) {
	array_push($myArray, $row[9].",". $row[16].",".$row[6].",".$row[5].",".$row[4]);
}


echo json_encode($myArray);

/*
$outArray = array();
$myArray = array();

while ($row = $results->fetchArray()) {
	array_push($myArray, $row[9].",". $row[16].",".$row[6].",".$row[5].",".$row[4]);
}


//array_push($myArray, "Crime Code".": "."7A".","."Crime Type".": "."BURGLARY".","."District".": "."NORTHEASTERN".","."Weapon Type".": "."HANDS");
//array_push($myArray,  "7A".","."BURGLARY".","."NORTHEASTERN".","."HANDS");


//array_push($myArray, "crimecode".': '."7A");
array_push($myArray, "7A");


array_push($outArray, $myArray);
echo json_encode($outArray);

*/


?>