<?php

$q = ($_GET['q']);

$db = new SQLite3('mydb.db');
$myStreet="STREET";
$results = $db->query("SELECT * FROM mydb WHERE premise='$myStreet'");


$myArray = array();
while ($row = $results->fetchArray()) {
	array_push($myArray, $row[9]." ". $row[16]);
  // var_dump($row);
 // print($row[9]);
  //print($row[16]);
 // echo "<br>";
// print("\n");
}

for($x=0; $x<count($myArray); $x++){
	//print($myArray[$x]);
}

?>



